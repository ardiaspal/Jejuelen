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

	{{-- <div id="load-loading">
		<div class="loading"></div>
	</div> --}}

	<div class="heading-website">
		<div class="image-gradient"></div>
		<div class="grup-all-nav">
			<div class="penyelamat">
				<div class="logo-jejuelen">
					<a href="/">
						<h3>Jejuelen.com</h3>
					</a>
				</div>
				<div class="navigasi-nav">
					<nav>
						<ul>
							@if (Auth::check())
							<li>
								<a href="/home">Hai, @if (Auth::user()->level == 0)
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
							<li><a href="/">Beranda</a></li>
							@if (Auth::check())
							@if (Auth::user()->level == 0)
							<li><a href="#!">Mimin</a>
								<ul>
									<li><a href="/managemen-pasar">Menegemen Pasar</a></li>
									<li><a href="#!">Pesanan</a></li>
									<li><a href="/daftar-petani">Daftar Petani</a></li>
									<li><a href="/daftar-pembeli">Daftar Pembeli</a></li>
									<li><a href="/daftar-mitra">Daftar Mitra</a></li>
								</ul>
							</li>
							@endif
							@endif
							@if (Auth::check())
							<li><a href="#!">Belanja</a>
								<ul>
									<li><a href="#!">Produk</a></li>
									<li><a href="#!">Transaksi</a></li>
									<li><a href="#!">History</a></li>

								</ul>
							</li>
							@else
							<li>
								<a href="#!">Belanja</a>
							</li>
							@endif
							@if (Auth::check())
							@if (Auth::user()->status_id != 0 && Auth::user()->status_id != 3)
							<li>
								<a href="#!"><i id="cart-belanja" class="fa fa-shopping-cart" aria-hidden="true"></i> (0)</a>
							</li>

							@endif
							@endif
							@if (!Auth::check())
							<li id="regis-log"><a href="{{ route('login') }}">Login</a> & <a href="{{ route('register') }}">Register</a></li>
                            @endif
                            @if (Auth::check())
                            <li id="regis-log">
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
				<div class="logo-jejuelen">
					<a href="#!">
						<h3>Jejuelen.com</h3>
					</a>
				</div>
				<div class="humberger">
					<span style="font-size:30px;cursor:pointer;color: white" onclick="openNav()">&#9776;</span>
				</div>
			</div>
		</div>
		<div class="head-center">
			<h1>Never Stop to be</h1>
			<h1>BETTER</h1>
			<p>"Cinta Produk Lokal Itu Tak Sekadar Bangga, tapi Beli dan Pakai Produknya"</p>
			@if (!Auth::check())
			<div class="join-register">
				<a href="{{ route('login') }}">Maso'</a>
				<a href="{{ route('register') }}">A Daftar Edie</a>
			</div>
			@endif
		</div>

	</div>

	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<a href="#!">About</a>
		<a href="#!">Services</a>
		<a href="#!">Clients</a>
		<a href="#!">Contact</a>
	</div>
	<div class="keuntungan-belanja">
		<div class="col-md-6">
			<h1>Menghubungkan Dengan Petani</h1>
			<p>Jejuelen adalah Ecommerce Pertanian Indonesia yang mengatasi permasalahan rantai pasokan dan distribusi hasil pertanian. Melalui teknologi, Jejuelen menghubungkan petani dengan pasar untuk memungkinkan petani menjual produk pertanian dengan harga yang adil dan kuantitas yang berkelanjutan.</p>
			<p>Didirikan pada akhir tahun 2015 sebagai aplikasi on-demand untuk mengirimkan sayuran dari lahan pertanian ke rumah tangga, pada bulan Juli 2016, Jejuelen mulai menjadi perusahaan B2B (Business to Business) semua jenis komoditas pertanian - Buah, Sayur, Unggas, Perikanan, Peternakan.</p>
		</div>
		<div class="col-md-6">
			<div class="video-code">
				<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://www.youtube.com/embed/JqNJWPG7wZE' frameborder='0' allowfullscreen></iframe></div>
			</div>
		</div>
	</div>

	<div class="content-jualan">
		<div class="col-sm-2 hidden-xs">
			<div class="img-crop">
				<img src="{{ asset('image/icon/img2.png') }}" alt="">
			</div>
		</div>
		<div class="col-sm-10">
			<div class="grup-seach">
				<div class="head-jualan">
					<h1>Kami Menyediakan produk dengan Kualitas terbaik langsung dari petani.</h1>
				</div>
				<form id="search-new" method="post">
					<input type="text" class="textbox" placeholder="Search">
					<input title="Search" value="" type="submit" class="button">
				</form>
			</div>
		</div>

		<div class="jualan-barang">

			@for ($i = 0; $i <12 ; $i++)
			<div class=" col-xs-12 col-sm-6 col-md-3" id="jual-jarak">
				<div class="box-wrapper">
					<img src="http://www.freefoodphotos.com/imagelibrary/herbs/slides/chilis.jpg" alt="rhcp" />
					<div class="box-content">
						<a href="#!" class="buy"><span><i class="fa fa-cart-plus"></i></span></a>
						<div class="title">Chili Papers</div>
						<div class="desc">Lorem ipsum dolor sit amet.</div>
						<span class="price">Rp. 12.000</span>
						<div class="footer">
							<ul>
								<li class="fa fa-star"></li>
								<li class="fa fa-star"></li>
								<li class="fa fa-star"></li>
								<li class="fa fa-star"></li>
								<li class="fa fa-star-o"></li>
							</ul>
						</div>
					</div>
					<div class="success"></div>
				</div>
			</div>
			@endfor

		</div>
	</div>

	<div class="about-web">
		<div class="image-font">
			<img src="{{ asset('image/quote-icon.svg') }}" alt="">
		</div>
		<div class="kata-about">
			<p id="kata-about-active">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit tempora, sit deserunt eaque quae deleniti expedita sunt, perferendis possimus unde earum voluptatem odio beatae nemo quibusdam ratione, magni, tempore! Deleniti.</p>
			<div class="nama-about" id="nama-active">
				<p>M lazuardi imani</p>
			</div>
			<div class="image-again">
				<div class="image-crop" id="image-crop-active">
					<a href="#!">
						<img src="{{ asset('image/ane.jpg') }}" alt="">
					</a>
				</div>
				<div class="image-crop">
					<a href="#!">
						<img src="{{ asset('image/ane.jpg') }}" alt="">
					</a>
				</div>
				<div class="image-crop">
					<a href="#!">
						<img src="{{ asset('image/ane.jpg') }}" alt="">
					</a>
				</div>
				<div class="image-crop">
					<a href="#!">
						<img src="{{ asset('image/ane.jpg') }}" alt="">
					</a>
				</div>
				<div class="image-crop">
					<a href="#!">
						<img src="{{ asset('image/ane.jpg') }}" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>

	<footer>
		<div class="col-xs-6">Copyright@2018</div>
		<div class="col-xs-6">We ❤ Jejuelen</div>
	</footer>
	<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
	<script type="text/javascript" src="{{ asset('js/javascript.js') }}"></script>
</body>
</html>
