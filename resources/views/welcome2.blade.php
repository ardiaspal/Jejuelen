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
									{{-- <li><a href="#!">Pesanan</a></li> --}}
								</ul>
							</li>
							@endif
							@endif
							@if (Auth::check())
							@if (Auth::user()->status_id == 3 || Auth::user()->status_id == 2 || Auth::user()->status_id == 1)
							<li><a href="#!">Belanja</a>
								<ul>
									<li><a href="/produk">Produk</a></li>
									@if (Auth::user()->status_id != 3)
									<li><a href="/pembayaran" class="hover-all">Transaksi</a></li>
									@else
									<li><a href="/transaksi-petani" class="hover-all">Transaksi</a></li>
									@endif
									<li><a href="/History">History</a></li>
								</ul>
							</li>
							@endif
							@endif
							@if (Auth::check())
							@if (Auth::user()->level == 0)
							<li><a href="#!" class="hover-all">User</a>
								<ul>
									<li><a href="/daftar-petani">Daftar Petani</a></li>
									<li><a href="/daftar-pembeli">Daftar Pembeli</a></li>
									<li><a href="/daftar-mitra">Daftar Mitra</a></li>
								</ul>
							</li>
							<li><a href="#!" class="hover-all">Transaksi</a>
								<ul>
									<li><a href="/produk">Produk</a></li>
									<li><a href="/pembayaran-mimin">Pembayaran</a></li>
								</ul>
							</li>
							@endif
							@else
							<li>
								<a href="/produk">Belanja</a>
							</li>
							@endif
							@if (Auth::check())
							@if (Auth::user()->status_id != 0 && Auth::user()->status_id != 3)
							<li>
								<a href="/pesanan"><i id="cart-belanja" class="fa fa-shopping-cart" aria-hidden="true"></i> ({{count(App\pesanan::where('user_id',Auth::user()->id)->where('status','tidak')->get())}})</a>
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
			<p>Didirikan pada pertengahan tahun 2018 sebagai aplikasi on-demand untuk mengirimkan sayuran dari lahan pertanian ke pembeli, pada bulan Agustus 2018.</p>
		</div>
		<div class="col-md-6">
			<div class="video-code">
				<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://www.youtube.com/embed/JqNJWPG7wZE' frameborder='0' allowfullscreen></iframe></div>
			</div>
		</div>
	</div>

	<div class="content-jualan">
		<div class="col-sm-12">
			<div class="img-crop">
				<img src="{{ asset('image/icon/img2.png') }}" alt="">
			</div>
			<div class="grup-seach">
				<div class="head-jualan">
					<h1>Kami Menyediakan produk dengan Kualitas terbaik langsung dari petani.</h1>
				</div>
				{{-- <form id="search-new" method="post">
					<input type="text" class="textbox" placeholder="Search">
					<input title="Search" value="" type="submit" class="button">
				</form> --}}
			</div>
		</div>

		<div class="jualan-barang">

			@if ($produkKG != null)
			@if (count($produkKG) > 0)
			<div class="jualan-barang">

				@foreach ($produkKG as $produk)
				<div class=" col-xs-12 col-sm-6 col-md-3" id="jual-jarak">
					<div class="box-wrapper">
						@if (!empty(App\pesanan::where('produkKg_id',$produk->id)->first()) && $produk->stok == 0)
						<div class="booking-lahan">
						</div>
						<h1>Sold Out</h1>
						@endif
						<img src="{{ asset('image/projek/'.$produk->image) }}" alt="{{$produk->nama}}" />
						<p>#KG</p>
						<div class="box-content">
							@if (Auth::check())
							@if (Auth::user()->id != $produk->petani->user->id && Auth::user()->status_id != 3 && Auth::user()->status_id != 0)
							<a href="#!" class="buy" data-toggle="modal" data-target="#buy{{$produk->id}}"><span><i class="fa fa-cart-plus"></i></span></a>
							@endif
							@endif
							<div class="title"><a href="/produk-KG/{{$produk->slug}}">{{$produk->nama}}</a></div>
							<div class="desc">Stok : {{$produk->stok}} Kg</div>
							<div class="desc">By <a style="color: #2a4a5b;text-decoration: none;" href="/petani-profile/{{$produk->petani->user->username}}">{{$produk->petani->name}}</a></div>
							<span class="price">Rp. {{$produk->hargaFix->hargaBuah}}</span>
							<div class="footer">
								<ul>
									<li style="color: #2a4a5b;">
										@if ($produk->created_at == $produk->updated_at)
										{{ $produk->created_at->diffForHumans()}}
										@else
										[Update] {{ $produk->updated_at->diffForHumans()}}
										@endif
									</li>
								</ul>
							</div>
						</div>
						<div class="success"></div>
					</div>
				</div>
				@endforeach
			</div>
			@endif
			@endif

		</div>
	</div>

	<div class="about-web">
		<div class="image-font">
			<img src="{{ asset('image/quote-icon.svg') }}" alt="">
		</div>
		<div class="kata-about">
			<div class="tab-content">

				<div class="tab-pane fade in active" id="menu1">
					<p id="kata-about-active">Orang pintar Suka buah</p>
					<div class="nama-about" id="nama-active">
						<p>Roni</p>
					</div>
				</div>
				<div class="tab-pane fade" id="menu2">
					<p id="kata-about-active">Penuhi kebutuhan serat dan vitaminmu disini!</p>
					<div class="nama-about" id="nama-active">
						<p>Nadia</p>
					</div>
				</div>
				<div class="tab-pane fade" id="menu3">
					<p id="kata-about-active">Tiada Hari Tanpa Shopping</p>
					<div class="nama-about" id="nama-active">
						<p>Adinda</p>
					</div>
				</div>
				<div class="tab-pane fade" id="menu4">
					<p id="kata-about-active">Mangann as Alwayss</p>
					<div class="nama-about" id="nama-active">
						<p>Lazuardi</p>
					</div>
				</div>
				<div class="tab-pane fade" id="menu5">
					<p id="kata-about-active">Jangan Lupa Empat Sehat 5 Sempurna dan Always Healhty</p>
					<div class="nama-about" id="nama-active">
						<p>Fahmi</p>
					</div>
				</div>
			</div>
			<div class="image-again">
				<div class="image-crop" id="image-crop-active">
					<a href="#menu1"  data-toggle="tab">
						<img src="{{ asset('image/avatartahilalats.jpg') }}" alt="">
					</a>
				</div>
				<div class="image-crop">
					<a href="#menu2"  data-toggle="tab">
						<img src="{{ asset('image/nadia.jpg') }}" alt="">
					</a>
				</div>
				<div class="image-crop">
					<a href="#menu3"  data-toggle="tab">
						<img src="{{ asset('image/dinda.jpg') }}" alt="">
					</a>
				</div>
				<div class="image-crop">
					<a href="#menu4"  data-toggle="tab">
						<img src="{{ asset('image/ane.jpg') }}" alt="">
					</a>
				</div>
				<div class="image-crop">
					<a href="#menu5"  data-toggle="tab">
						<img src="{{ asset('image/fahmi.jpg') }}" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>
	@if (Auth::check())
	@if ($produkKG != null)
	@if (count($produkKG) > 0)
	@foreach ($produkKG as $produk)
	<!-- Modal -->
	<div id="buy{{$produk->id}}" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">

			<!-- Modal content-->
			<div class="modal-content" style="font-family: Righteous;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Buy produk {{$produk->nama}}</h4>
				</div>
				<div class="modal-body">
					<form action="/pesanan/kg" method="POST" id="form-buy-kg">
						@if (Auth::user()->status_id == 2)
						<p>*maximal pembelian 10kg</p>
						<div class="form-group">
							<input type="number" min="1" max="10" name="jumlah" placeholder="jumlah pembelian">
						</div>
						@else
						<p>*Minimal pembelian 10kg</p>
						<div class="form-group">
							<input type="number" min="10" max="{{$produk->stok}}" name="jumlah" placeholder="jumlah pembelian">
						</div>
						@endif
						<input type="hidden" name="produkKg_id" value="{{$produk->id}}">
						<input type="hidden" name="harga" value="{{$produk->hargaFix->hargaBuah}}">
						{{ csrf_field() }}
						<div class="form-group">
							<button type="submit">Buy</button>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
	@endforeach
	@endif
	@endif
	@endif
	<footer>
		<div class="col-xs-6">Copyright@2018</div>
		<div class="col-xs-6">We ❤ Jejuelen</div>
	</footer>
	<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
	<script type="text/javascript" src="{{ asset('js/javascript.js') }}"></script>
	<script type="text/javascript">
		$('.image-crop').click(function () {
			$('.image-again').find('#image-crop-active').removeAttr('id');
			$(this).attr("id", "image-crop-active");

		});
	</script>
</body>
</html>
