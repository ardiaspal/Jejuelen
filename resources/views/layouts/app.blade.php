<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jejuelen</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">

</head>
<body>
    <div class="heading-nav">
        <div class="grup-all-nav">
            <div class="penyelamat">
                <div class="logo-jejuelen-v2">
                    <a href="/">
                        <h3>Jejuelen.com</h3>
                    </a>
                </div>
                <div class="navigasi-nav-v2">
                    <nav>
                        <ul>
                            <li><a class="hover-new" href="/">Beranda</a></li>
                            <li><a class="hover-new" href="#!">Mimin</a>
                                <ul>
                                    <li><a class="hover-guy" href="#!">Menegemen Pasar</a></li>
                                    <li><a class="hover-guy" href="#!">Pesanan</a></li>
                                    <li><a class="hover-guy" href="#!">Daftar Petani</a></li>
                                    <li><a class="hover-guy" href="#!">Daftar Pembeli</a></li>
                                </ul>
                            </li>
                            <li><a class="hover-all" href="#!">Produk</a>
                                <ul>
                                    <li><a  class="hover-guy" href="#!">Tambah Produk</a></li>
                                    <li><a  class="hover-guy" href="#!">Daftar Produk</a></li>
                                </ul>
                            </li>
                            <li><a class="hover-all" href="#!">Belanja</a>
                                <ul>
                                    <li><a class="hover-guy" href="#!">Produk</a></li>
                                    <li><a class="hover-guy" href="#!">Transaksi</a></li>
                                    <li><a class="hover-guy" href="#!">History</a></li>
                                </ul>
                            </li>
                            <li id="regis-log-v2"><a href="{{ route('login') }}">Login</a> & <a href="{{ route('register') }}">Register</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="grup-sendiri">
            <div class="penyelamtan-mobile">
                <div class="logo-jejuelen-v2">
                    <a href="#!">
                        <h3>Jejuelen.com</h3>
                    </a>
                </div>
                <div class="humberger-v2">
                    <span style="font-size:30px;cursor:pointer;color: #2a4a5b;" onclick="openNav()">&#9776;</span>
                </div>
            </div>
        </div>
    </div>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#!">About</a>
        <a href="#!">Services</a>
        <a href="#!">Clients</a>
        <a href="#!">Contact</a>
    </div>

    @yield('content')

    <footer>
        <div class="col-xs-6">Copyright@2018</div>
        <div class="col-xs-6">We ❤ Jejuelen</div>
    </footer>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('js/javascript.js') }}"></script>
</body>
</html>

