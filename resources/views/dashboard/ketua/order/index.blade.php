@extends('layouts.dashboard.base')

@section('title', 'Pesanan')

@push('style')
    <link rel="stylesheet" href="{{ asset('dashboard/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('dashboard/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pesanan</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tabel Pesanan</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-order">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Tanggal Pemesanan</th>
                                                <th>Nama Pemesan</th>
                                                <th>Total Harga Pesanan</th>
                                                <th>Metode Pembayaran</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $i => $order)
                                                <tr>
                                                    <td>{{ $i+1 }}</td>
                                                    <td>{{ $order->created_at }}</td>
                                                    <td>{{ $order->cart->user->name }}</td>
                                                    <td>Rp{{ number_format($order->subtotal + $order->customer_shipping) }}</td>
                                                    <td>{{ $order->payment_type == 'transfer' ? ucfirst($order->payment_type) : strtoupper($order->payment_type) }}</td>
                                                    <td>{!! $order->status !!}</td>
                                                    <td class="d-flex">
                                                        @if ($order->getRawOriginal('status') == 'Menunggu Pembayaran' || $order->getRawOriginal('status') == 'Pesanan Diproses' || $order->getRawOriginal('status') == 'Pesanan Dibatalkan')
                                                        @else
                                                            <a href="{{ route('ketua.pesanan.show', $order->id) }}" class="btn btn-primary mr-1" data-toggle="tooltip" title="" data-original-title="Lihat Invoice"><i class="fa fa-eye"></i></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('script')
    <script src="{{ asset('dashboard/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('dashboard/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('dashboard/modules/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/page/modules-datatables.js') }}"></script>

    <script>
        "use strict"

        $("#table-order").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [2, 4, 5, 7]
            }]
        });
    </script>
@endpush
