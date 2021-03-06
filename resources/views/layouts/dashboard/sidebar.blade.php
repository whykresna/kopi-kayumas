<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('beranda') }}">Kopi Kayumas</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('beranda') }}"><img src="{{ asset('landing/images/logo.png') }}" width="30" height="30" alt="Logo Kopi Kayumas"></a>
        </div>
        <ul class="sidebar-menu">
            @role('admin')
                <li class="{{ Request::route()->getName() == 'admin.pengguna.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.pengguna.index') }}"><i class="fas fa-user"></i>
                        <span>Pengguna</span>
                    </a>
                </li>
                <li class="{{ Request::route()->getName() == 'admin.berita.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.berita.index') }}"><i class="fas fa-newspaper"></i>
                        <span>Berita</span>
                    </a>
                </li>
                <li class="{{ Request::route()->getName() == 'admin.aduan.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.aduan.index') }}"><i class="fas fa-ticket-alt"></i>
                        <span>Aduan</span>
                    </a>
                </li>
            @elserole('ketua')
                <li class="{{ Request::route()->getName() == 'ketua.beranda' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('ketua.beranda') }}"><i class="fas fa-columns"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::route()->getName() == 'ketua.berita.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('ketua.berita.index') }}"><i class="fas fa-newspaper"></i>
                        <span>Berita</span>
                    </a>
                </li>
                <li class="{{ Request::route()->getName() == 'ketua.pesanan.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('ketua.pesanan.index') }}"><i class="fas fa-receipt"></i>
                        <span>Pesanan</span>
                    </a>
                </li>
                <li class="{{ Request::route()->getName() == 'ketua.produk.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('ketua.produk.index') }}"><i class="fas fa-box"></i>
                        <span>Produk</span>
                    </a>
                </li>
                <li class="{{ Request::route()->getName() == 'ketua.anggota.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('ketua.anggota.index') }}"><i class="fas fa-user"></i>
                        <span>Anggota</span>
                    </a>
                </li>
                <li class="{{ Request::route()->getName() == 'ketua.persediaan.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('ketua.persediaan.index') }}"><i class="fas fa-warehouse"></i>
                        <span>Persediaan</span>
                    </a>
                </li>
                <li class="{{ Request::route()->getName() == 'ketua.harga.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('ketua.harga.index') }}"><i class="fas fa-money-bill"></i>
                        <span>Harga Ambil</span>
                    </a>
                </li>
            @elserole('anggota')
                <li class="{{ Request::route()->getName() == 'anggota.persediaan.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('anggota.persediaan.index') }}"><i class="fas fa-warehouse"></i>
                        <span>Persediaan</span>
                    </a>
                </li>
                <li class="{{ Request::route()->getName() == 'anggota.harga.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('anggota.harga.index') }}"><i class="fas fa-money-bill"></i>
                        <span>Harga Ambil</span>
                    </a>
                </li>
            @elserole('pembeli')
                <li class="{{ Request::route()->getName() == 'pembeli.pesanan.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pembeli.pesanan.index') }}"><i class="fas fa-receipt"></i>
                        <span>Pesanan</span>
                    </a>
                </li>
            @elserole('penjual')
            <li class="{{ Request::route()->getName() == 'penjual.pesanan.index' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('penjual.pesanan.index') }}"><i class="fas fa-receipt"></i>
                    <span>Pesanan</span>
                </a>
            </li>
            @endrole
    </aside>
</div>
