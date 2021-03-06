@extends('layouts.dashboard.base')

@section('title', 'Harga Ambil')

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
                <h1>Harga Ambil</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tabel Harga Ambil</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-bean-price">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Nomor Telepon</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $i => $user)
                                                <tr>
                                                    <td>{{ $i+1 }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->profile !== null ? $user->profile->address : '' }}</td>
                                                    <td>{{ $user->profile !== null ? $user->profile->phone : '' }}</td>
                                                    <td>
                                                        <button class="btn btn-primary btn-bean-price" data-toggle="modal" data-id="{{ $user->id }}">Lihat Harga Ambil</a>
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
        @include('dashboard.anggota.price.show')
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

        $("#table-bean-price").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [1, 2, 3, 4]
            }]
        });

        $(".btn-bean-price").click(function() {
            let id = $(this).data("id");
            $.ajax({
                method: "GET",
                url: "/anggota/harga/" + id,
            }).done(function(result) {
                $("#show-bean-price").modal("show");
                $("#table-bean-price-detail").find("tbody").empty();
                $.each(result, function(index, item) {
                    $("#table-bean-price-detail").find("tbody").append(
                        `<tr>` +
                            `<td>` + item.id + `</td>` +
                            `<td>` + item.name + `</td>` +
                            `<td>Rp` + item.price + `/kg</td>` +
                        `</tr>`
                    );
                });
            });
        });
    </script>
@endpush
