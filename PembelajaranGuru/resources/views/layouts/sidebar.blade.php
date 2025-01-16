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
                <li class="active">
                    <a href="{{ route('kepsek.dashboard') }}">
                        <i class="fa fa-home"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="#">
                        <i class="fa fa-users"></i> <span>Kasir</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-credit-card"></i> <span>Jenis Pembayaran</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i> <span>Barang</span>
                    </a>
                </li>
                <li class="header">MAIN NAVIGATION</li>

                <li>
                    <a href="#">
                        <i class="fa fa-cart-arrow-down"></i> <span>Order</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-book"></i> <span>Laporan</span>
                    </a>
                </li>
                <li class="header">MAIN NAVIGATION</li>
            @endif

            <!-- Sidebar for Wakasek role -->
            @if(Auth::check() && Auth::user()->role == 'wakasek')
                <li class="active">
                    <a href="{{ route('Wakasek.dashboard') }}">
                        <i class="fa fa-home"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="header">MAIN NAVIGATION</li>

                <li>
                    <a href="{{ route('wakasek.dataGuru.index') }}">
                        <i class="fa fa-users"></i><span>Data Guru</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('wakasek.wakasek.blangkos.index') }}">
                      <i class="fa fa-upload"></i> <span>Upload Format</span>
                    </a>
                  </li>
                <li>
                    <a href="#">
                        <i class="fa fa-history"></i> <span>History</span>
                    </a>
                </li>
                <li class="header">MAIN NAVIGATION</li>
            @endif

            <!-- Sidebar for Guru role -->
            @if(Auth::check() && Auth::user()->role == 'guru')
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="{{ route('guru.dashboard') }}">
                        <i class="fa fa-file"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i><span>Barang</span>
                    </a>
                </li>
                <li>
                    <a href="#">
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

<style>
    /* Active Sidebar Link Style */
    .sidebar-menu li.active > a {
        background-color: #007bff;
        color: #fff;
    }

    .sidebar-menu li.active > a i {
        color: #fff;
    }

    /* Add transition for smooth animation */
    .sidebar-menu li a {
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .sidebar-menu li:hover > a {
        background-color: #f4f6f9;
    }

    /* Sidebar hover effect */
    .sidebar-menu li a {
        display: flex;
        align-items: center;
        padding: 10px 15px;
    }
</style>

<script>
    // jQuery to add smooth animations and toggle active state
    $(document).ready(function() {
        $('.sidebar-menu li a').on('click', function() {
            // Remove active class from all sidebar items
            $('.sidebar-menu li').removeClass('active');

            // Add active class to the clicked item
            $(this).parent('li').addClass('active');
        });
    });
</script>
