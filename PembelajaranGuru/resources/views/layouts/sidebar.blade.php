<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('AdminLTE-2.3.11') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                @if(Auth::check())
                    <p>{{ Auth::user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                @else
                    <p>Guest</p>
                    <a href="#"><i class="fa fa-circle text-danger"></i> Offline</a>
                @endif
            </div>
        </div>

        <ul class="sidebar-menu">
            <!-- Sidebar for Admin role -->
            @if(Auth::check() && Auth::user()->role == 'kepsek')
                <li class="{{ Request::routeIs('kepsek.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('kepsek.dashboard') }}">
                        <i class="fa fa-home"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="header"></li>
                <li class="{{ Request::is('kasir*') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>Kasir</span>
                    </a>
                </li>
                <li class="{{ Request::is('jenis-pembayaran*') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-credit-card"></i> <span>Jenis Pembayaran</span>
                    </a>
                </li>
                <li class="{{ Request::is('barang*') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i> <span>Barang</span>
                    </a>
                </li>
                <li class="{{ Request::is('order*') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-cart-arrow-down"></i> <span>Order</span>
                    </a>
                </li>
                <li class="{{ Request::is('laporan*') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-book"></i> <span>Laporan</span>
                    </a>
                </li>
            @endif

            <!-- Sidebar for Wakasek role -->
            @if(Auth::check() && Auth::user()->role == 'wakasek')
            <li class="{{ Request::routeIs('Wakasek.dashboard') ? 'active' : '' }}">
                <a href="{{ route('Wakasek.dashboard') }}">
                    <i class="fa fa-tachometer-alt"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="header"></li>
            <li class="{{ Request::routeIs('wakasek.dataGuru.index') ? 'active' : '' }}">
                <a href="{{ route('wakasek.dataGuru.index') }}">
                    <i class="fa fa-chalkboard-teacher"></i> <span>Data Guru</span>
                </a>
            </li>
            <li class="{{ Request::routeIs('wakasek.wakasek.blangkos.index') ? 'active' : '' }}">
                <a href="{{ route('wakasek.wakasek.blangkos.index') }}">
                    <i class="fa fa-file-upload"></i> <span>Upload Blangko</span>
                </a>
            </li>
            <li class="{{ Request::routeIs('wakasek.wakasek.uploads') ? 'active' : '' }}">
                <a href="{{ route('wakasek.wakasek.uploads') }}">
                    <i class="fa fa-folder-open"></i> <span>Pengumpulan Blangko</span>
                </a>
            </li>
            <li class="header"></li>
            <li class="{{ Request::routeIs('wakasek.mapel.index') ? 'active' : '' }}">
                <a href="{{ route('wakasek.mapel.index') }}">
                    <i class="fa fa-book"></i> <span>Mata Pelajaran</span>
                </a>
            </li>
            <li class="{{ Request::routeIs('jenis_blangko.index') ? 'active' : '' }}">
                <a href="{{ route('jenis_blangko.index') }}">
                    <i class="fa fa-file-alt"></i> <span>Jenis Blangko</span>
                </a>
            </li>
            <li class="header"></li>
        @endif
        

            <!-- Sidebar for Guru role -->
            @if(Auth::check() && Auth::user()->role == 'guru')
                <li class="{{ Request::routeIs('guru.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('guru.dashboard') }}">
                        <i class="fa fa-file"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('guru.guru.blangko') ? 'active' : '' }}">
                    <a href="{{ route('guru.guru.blangko') }}">
                        <i class="fa fa-file-alt"></i> <span>Dokumen Pengerjaan</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('guru.guru.guru.upload.tugas.form') ? 'active' : '' }}">
                    <a href="{{ route('guru.guru.guru.upload.tugas.form') }}">
                        <i class="fa fa-upload"></i> <span>Upload Dokumen</span>
                    </a>
                </li>
                <li class="header"></li>
                <li class="{{ Request::is('laporan*') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-book"></i> <span>Laporan</span>
                    </a>
                </li>
                <li class="header"></li>
            @endif

            <!-- Logout -->
            <li>
                <a href="/logout">
                    <i class="fa fa-sign-out-alt"></i> <span>Logout</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
