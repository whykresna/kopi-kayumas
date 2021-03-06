@extends('layouts.landing.base')

@section('title', 'Toko')

@push('style')
    <style>
        .block-27 nav {
            display: flex;
            justify-content: center;
        }

        .block-27 nav ul li {
            margin: 0 2px;
        }
    </style>
@endpush

@section('content')
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('landing/images/bg_1.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Produk Kami</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a
                                    href="{{ route('beranda') }}">Beranda</a></span>
                            <span>Produk</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @if ($products->isNotEmpty())
        <section class="ftco-menu mb-5 pb-5">
            <div class="container">
                <div class="row ftco-animate">
                    <div class="col-12">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <div class="icon">
                                    <span class="icon-search"></span>
                                </div>
                                <input id="search" name="search" type="text" class="form-control" placeholder="Cari Produk Disini...">
                            </div>
                        </form>
                    </div>
                </div>
                <div id="productList" class="row ftco-animate">
                    @foreach ($products as $product)
                        <div id="productItem" class="col-md-4">
                            <div class="menu-entry">
                                <a href="{{ route('detail.toko', $product->slug) }}" class="img"
                                    style="background-image: url({{ asset('storage/product/' . $product->image) }});"></a>
                                <div class="text text-center pt-4">
                                    <h3><a href="{{ route('detail.toko', $product->slug) }}">{{ $product->name }}</a></h3>
                                    <p>{{ $product->excerpt }}</p>
                                    <p class="price"><span>Rp{{ number_format($product->price) }}</span></p>
                                    <p><a href="{{ route('detail.toko', $product->slug) }}" class="btn btn-block btn-primary py-3 px-5">Lihat Produk</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row mt-5">
                    <div class="col">
                        <div class="block-27">
                            {{ $products->links('pagination::default') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection

@push('script')
    <script>
        "use strict"

        function getSearchResult(data) {
            if (data.length !== 0) {
                $("#productList > #productItem").hide();
                $.each(data, function(index, value) {
                    $("#productList").append(
                        `<div id="productItem" class="col-md-4">` +
                            `<div class="menu-entry">` +
                                `<a href="/toko/` + value.slug + `" class="img"` +
                                    `style="background-image: url('storage/product/` + value.image + `')"></a>` +
                                `<div class="text text-center pt-4">` +
                                    `<h3><a href="/toko/` + value.slug + `">` + value.name + `</a></h3>` +
                                    `<p>` + value.excerpt + `</p>` +
                                    `<p class="price"><span>Rp` +  parseInt(value.price).toLocaleString('en') + `</span></p>` +
                                    `<p><a href="/toko/` + value.slug + `" class="btn btn-block btn-primary py-3 px-5">Lihat Produk</a></p>` +
                                `</div>` +
                            `</div>` +
                        `</div>`
                    )
                });
            }
        }

        let jqxhr = {
            abort: function() {}
        };
        
        $("#search").on("input", function() {
            let search = $(this).val();
            jqxhr.abort();
            jqxhr = $.ajax({
                method: "GET",
                url: "/search",
                data: {
                    "search": search
                },
            }).done(function(data){
                getSearchResult(data);
            });
        });
    </script>
@endpush
