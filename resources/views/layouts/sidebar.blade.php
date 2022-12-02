<div class="mobile-main-sidebar">
    <div class="inner">
        <ul class="icon-side-menu">

            <li>
                <a href="" id="layouts-sidebar-menu-mobile">
                    <i data-feather="grid"></i>
                </a>
            </li>

        </ul>

        {{-- <ul class="bottom-icon-side-menu">
            <li>
                <a href="javascript:" class="right-panel-trigger" data-panel="search-panel">
                    <i data-feather="search"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i data-feather="settings"></i>
                </a>
            </li>
        </ul> --}}
    </div>
</div>

<div id="sidebar-block" class="sidebar-block is-curved is-colored">
    <div class="sidebar-block-header">
        <a class="sidebar-block-logo" href="/">
            <img class="light-image" src="/assets/img/logos/logo/logo4.png" alt="" />
            <img class="dark-image" src="/assets/img/logos/logo/logo5.png" alt="" />
        </a>
        <h3>Salon Fransisco</h3>
    </div>
    <div class="sidebar-block-inner" data-simplebar>
        <ul>

            <li>
                <a class="single-link" href="/home">
                    <span class="icon">
                        <i data-feather="home"></i>
                    </span>
                    Dashboard
                </a>
            </li>
            @if (Auth::user()->role == 'admin')
                {{-- <li>
                    <a class="single-link" href="/user/create">
                        <span class="icon">
                            <i data-feather="user-plus"></i>
                        </span>
                        Tambah User
                    </a>
                </li> --}}

                <li class="divider"></li>
                <li>
                    <a class="single-link" href="/user">
                        <span class="icon">
                            <i data-feather="users"></i>
                        </span>
                        Daftar User
                    </a>
                </li>
            @endif
            @if (Auth::user()->role == 'kasir')
                <li class="divider"></li>

                <li>
                    <a class="single-link" href="/kasir">
                        <span class="icon">
                            <i data-feather="shopping-bag"></i>
                        </span>
                        Kasir
                    </a>
                </li>



                <li>
                    <a class="single-link" href="/jasa">
                        <span class="icon">
                            <i data-feather="list"></i>
                        </span>
                        Jasa
                    </a>
                </li>

                <li>
                    <a class="single-link" href="/laporan">
                        <span class="icon">
                            <i data-feather="archive"></i>
                        </span>
                        Laporan
                    </a>
                </li>
            @endif
            @if (Auth::user()->role == 'gudang')
                <li class="divider"></li>

                {{-- <li>
                    <a class="single-link" href="/gudang/">
                        <span class="icon">
                            <i data-feather="plus"></i>
                        </span>
                        Tambah Barang
                    </a>
                </li> --}}

                <li>
                    <a class="single-link" href="/barang">
                        <span class="icon">
                            <i data-feather="shopping-bag"></i>
                        </span>
                        Barang
                    </a>
                </li>

                {{-- <li>
                    <a class="single-link" href="/gudang/">
                        <span class="icon">
                            <i data-feather="user-plus"></i>
                        </span>
                        Tambah Suplier
                    </a>
                </li> --}}

                <li>
                    <a class="single-link" href="/suplier">
                        <span class="icon">
                            <i data-feather="users"></i>
                        </span>
                        Suplier
                    </a>
                </li>
                <li>
                    <a class="single-link" href="/pengambilan">
                        <span class="icon">
                            <i data-feather="bookmark"></i>
                        </span>
                        Pengambilan
                    </a>
                </li>
                <li>
                    <a class="single-link" href="/pembelian">
                        <span class="icon">
                            <i data-feather="truck"></i>
                        </span>
                        Pembelian
                    </a>
                </li>
            @endif
            @if (Auth::user()->role == 'bos')
                {{-- <li>
                    <a class="single-link" href="/user/create">
                        <span class="icon">
                            <i data-feather="user-plus"></i>
                        </span>
                        Tambah User
                    </a>
                </li> --}}

                <li class="divider"></li>
                <li>
                    <a class="single-link" href="/laporan">
                        <span class="icon">
                            <i data-feather="archive"></i>
                        </span>
                        Laporan
                    </a>
                </li>
            @endif

            {{-- <li class="has-children">
                <div class="collapse-wrap">
                    <a href="javascript:void(0);" class="parent-link">
                        <div class="icon">
                            <i data-feather="settings"></i>
                        </div>
                        Settings
                        <i data-feather="chevron-right"></i>
                    </a>
                </div>
                <ul>
                    <li>
                        <a class="is-submenu" href="/admin-dashboards-personal-1.html">
                            <i class="lnil lnil-home"></i>
                            <span>General</span>
                        </a>
                    </li>
                    <li>
                        <a class="is-submenu" href="/admin-dashboards-personal-2.html">
                            <i class="lnil lnil-lock-alt"></i>
                            <span>Security</span>
                        </a>
                    </li>
                    <li>
                        <a class="is-submenu" href="/admin-dashboards-personal-3.html">
                            <i class="lnil lnil-coin"></i>
                            <span>Transactions</span>
                        </a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </div>
    <div class="sidebar-block-footer">
        @include('layouts.profil_logout', [
            'para' => 'profile-dropdown dropdown-trigger is-spaced is-up',
        ])

        {{-- <a class="search-link right-panel-trigger" data-panel="search-panel">
            <i data-feather="search"></i>
        </a> --}}
    </div>
</div>

<div class="mobile-subsidebar">
    <div class="inner">
        <div class="sidebar-title">
            <h3>Layouts</h3>
        </div>

        <ul class="submenu">
            <li class="has-children">
                <div class="collapse-wrap">
                    <a href="javascript:void(0);" class="parent-link">Lists <i data-feather="chevron-right"></i></a>
                </div>
                <ul>
                    <li>
                        <a class="is-submenu" href="/admin-list-view-1.html">
                            <i class="lnil lnil-list-alt"></i>
                            <span>List View V1</span>
                        </a>
                    </li>

                </ul>
            </li>



            <li class="divider"></li>




        </ul>

    </div>
</div>
