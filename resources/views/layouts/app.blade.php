<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jejuelen - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker3.css') }}">
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/tinymcescript.js') }}" type="text/javascript"></script>
    @yield('style')
</head>
<body>
    <div class="heading-nav" style="z-index: 1;">
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
                            @if (Auth::check())
                            <li>
                                <a href="/home" class="hover-new">Hai, @if (Auth::user()->level == 0)
                                    Admin
                                    @elseif (Auth::user()->status_id == 3)
                                    {{App\petani::where('email',Auth::user()->email)->first()->name}}
                                    @elseif(Auth::user()->status_id == 2)
                                    {{App\konsumenUmum::where('email',Auth::user()->email)->first()->name}}
                                    @elseif(Auth::user()->status_id == 1)
                                    {{App\konsumenMitra::where('email',Auth::user()->email)->first()->namaCv}}
                                    @endif
                                </a>
                            </li>
                            @endif
                            <li><a class="hover-new" href="/">Beranda</a></li>
                            @if (Auth::check())
                            @if (Auth::user()->level == 0)
                            <li><a href="#!" class="hover-new">Mimin</a>
                                <ul>
                                    <li><a href="/managemen-pasar" class="hover-guy">Menegemen Pasar</a></li>
                                    <li><a href="#!" class="hover-guy">Pesanan</a></li>
                                    <li><a href="/daftar-petani" class="hover-guy">Daftar Petani</a></li>
                                    <li><a href="/daftar-pembeli" class="hover-guy">Daftar Pembeli</a></li>
                                    <li><a href="/daftar-mitra" class="hover-guy">Daftar Mitra</a></li>
                                </ul>
                            </li>
                            @endif
                            @endif
                            @if (Auth::check())
                            <li><a href="#!" class="hover-all">Belanja</a>
                                <ul>
                                    <li><a href="/produk" class="hover-all">Produk</a></li>
                                    <li><a href="#!" class="hover-all">Transaksi</a></li>
                                    <li><a href="#!" class="hover-all">History</a></li>
                                    
                                </ul>
                            </li>
                            @else
                            <li>
                                <a href="/produk">Belanja</a>
                            </li>
                            @endif
                            @if (Auth::check())
                            @if (Auth::user()->status_id != 0 && Auth::user()->status_id != 3)
                            <li>
                                <a href="#!"><i id="cart-belanja" class="fa fa-shopping-cart" aria-hidden="true"></i> ({{count(App\pesanan::where('user_id',Auth::user()->id)->where('status','tidak')->get())}})</a>
                            </li>

                            @endif
                            @endif
                            @if (!Auth::check())
                            <li id="regis-log-v2"><a href="{{ route('login') }}">Login</a> & <a href="{{ route('register') }}">Register</a></li>
                            @endif
                            @if (Auth::check())
                            <li id="regis-log-v2">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> {{ csrf_field() }} </form>
                            </li>
                            @endif
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
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/Chart.min.js') }}" type="text/javascript"></script>
    @yield('script')
    <script type="text/javascript" src="{{ asset('js/javascript.js') }}"></script>
</body>
</html>

