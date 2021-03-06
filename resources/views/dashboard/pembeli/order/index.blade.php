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
                @include('layouts.dashboard.alert')
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
                                                <th>Total Harga Pesanan</th>
                                                <th>Metode Pembayaran</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                                <th>Kontak</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $i => $order)
                                                <tr>
                                                    <td>{{ $i+1 }}</td>
                                                    <td>{{ $order->created_at }}</td>
                                                    <td>Rp{{ number_format($order->subtotal + $order->customer_shipping) }}</td>
                                                    <td>{{ $order->payment_type == 'transfer' ? ucfirst($order->payment_type) : strtoupper($order->payment_type) }}</td>
                                                    <td>{!! $order->status !!}</td>
                                                    <td class="d-flex">
                                                        @if ($order->getRawOriginal('status') == 'Menunggu Pembayaran')
                                                            <a href="{{ route('pembayaran', $order->id) }}" class="btn btn-primary mr-1" data-toggle="tooltip" title="" data-original-title="Selesaikan Pembayaran"><i class="fa fa-credit-card"></i></a>
                                                            <form action="{{ route('pembeli.pesanan.cancel', $order->id) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-danger mr-1" data-toggle="tooltip" title="" data-original-title="Pesanan Dibatalkan"><i class="fa fa-times"></i></button>
                                                            </form>
                                                        @elseif ($order->getRawOriginal('status') == 'Pesanan Diproses')
                                                            <form action="{{ route('pembeli.pesanan.cancel', $order->id) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-danger mr-1" data-toggle="tooltip" title="" data-original-title="Pesanan Dibatalkan"><i class="fa fa-times"></i></button>
                                                            </form>
                                                        @elseif ($order->getRawOriginal('status') == 'Pesanan Dikirim')
                                                            <a href="{{ route('pembeli.pesanan.show', $order->id) }}" class="btn btn-primary mr-1" data-toggle="tooltip" title="" data-original-title="Lihat Invoice"><i class="fa fa-eye"></i></a>
                                                            <form action="{{ route('pembeli.pesanan.finish', $order->id) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-success mr-1" data-toggle="tooltip" title="" data-original-title="Selesaikan Pesanan"><i class="fa fa-check"></i></button>
                                                            </form>
                                                            <a href="{{ route('pembeli.pesanan.refund', $order->id) }}" class="btn btn-danger" data-toggle="tooltip" title="" data-original-title="Kembalikan Pesanan"><i class="fa fa-undo"></i></a>
                                                        @elseif ($order->getRawOriginal('status') == 'Pesanan Dibatalkan')
                                                        @else
                                                            <a href="{{ route('pembeli.pesanan.show', $order->id) }}" class="btn btn-primary mr-1" data-toggle="tooltip" title="" data-original-title="Lihat Invoice"><i class="fa fa-eye"></i></a>
                                                        @endif
                                                    </td>
                                                    <td><a href="{{ url('https://wa.me/081234567890') }}" class="btn btn-primary" data-toggle="tooltip" title="" data-original-title="Hubungi Penjual"><i class="fa fa-phone"></i></a></td>
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
                "targets": [1, 2, 3, 4, 5, 6]
            }]
        });
    </script>
@endpush
