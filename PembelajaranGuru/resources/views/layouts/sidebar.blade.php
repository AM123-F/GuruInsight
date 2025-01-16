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
            <!-- Dashboard for all roles -->
            
            <!-- Sidebar for Admin role -->
            @if(Auth::check() && Auth::user()->role == 'kepsek')
            <li class="active">
                <a href="{{ route('kepsek.dashboard') }}">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="">
                    <i class="fa fa-users"></i> <span>Kasir</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-credit-card"></i> <span>Jenis Pembayaran</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-shopping-cart"></i> <span>Barang</span>
                </a>
            </li>
            <li class="header">MAIN NAVIGATION</li>

            <li>
                <a href="">
                    <i class="fa fa-cart-arrow-down"></i> <span>Order</span>
                </a>
            </li>
            {{-- @isset($petugas) --}}
                
            {{-- <li>
                <a href="{{ route('admin.tambahPetugas.show', $petugas->id) }}" class="btn btn-info"></a>
                <i class="fa fa-file"></i> <span>Data Kasir</span>
                </a>
            </li> --}}
            {{-- @endisset --}}

            <li>
                <a href="">
                    <i class="fa fa-book"></i> <span>Laporan</span>
                </a>
            </li>

            <li class="header">MAIN NAVIGATION</li>

            @endif

            <!-- Sidebar for Kasir role -->
            @if(Auth::check() && Auth::user()->role == 'wakasek')
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="{{ route('wakasek.dashboard') }}">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="header">MAIN NAVIGATION</li>

            <li>
                <a href="{{ route('wakasek.dataGuru.index') }}">
                    <i class="fa fa-shopping-cart"></i><span>Data Guru</span>
                </a>
            </li>
            <li>
                <a href="{{ route('wakasek.blangkos.index') }}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Blangko</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-history"></i> <span>History</span>
                </a>
            </li>
            <li class="header">MAIN NAVIGATION</li>

            @endif

            <!-- Sidebar for Owner role -->
            @if(Auth::check() && Auth::user()->role == 'guru')
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{ route('admin.tambahPetugas.show') }}">
                    <i class="fa fa-file"></i> <span>Data Kasir</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.barang.show') }}">
                    <i class="fa fa-shopping-cart"></i><span>Barang</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.orders.history') }}">
                    <i class="fa fa-history"></i> <span>History</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-book"></i> <span>Laporan</span>
                </a>
            </li>
            @endif
            <li>
                <a href="/logout">
                    <i class="fa fa-sign-out-alt"></i> <span>Logout</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
