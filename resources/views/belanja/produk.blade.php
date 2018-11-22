@extends('layouts.app')
@section('title', 'Produk')
@section('style')
<style type="text/css">
.modal {
	text-align: center;
	padding: 0!important;
}

.modal:before {
	content: '';
	display: inline-block;
	height: 100%;
	vertical-align: middle;
	margin-right: -4px;
}

.modal-dialog {
	display: inline-block;
	text-align: left;
	vertical-align: middle;
}
</style>
@endsection
@section('content')


<div class="grup-all-produk-new">
	<h1 style="text-align: center;color: #2a4a5b;font-family: Pacifico;margin-bottom: 4px;">Selamat Berbelanja</h1>
	<p style="text-align: center;color: #2a4a5b;font-family: Pacifico;">"Temukan Buah dengan Kualitas Terbaik dIsini"</p>
	<div class="col-xs-12 col-sm-2 col-md-2">
		<ul id="side-nav-padding-produk">
			<li>
				<form action="">
					<input type="text"  name="search" id="search" placeholder="cari produk">
					<input type="hidden"  name="typeProduk" id="type-search" value="kg" placeholder="cari produk">
				</form>
			</li>
			@if (Auth::check())
			<li><a href="#menu1" id="kg-change" data-toggle="tab">Produk KG</a></li>
			@if (Auth::user()->status_id  == 1 || Auth::user()->status_id  == 0 || Auth::user()->status_id  == 3 )
			<li><a href="#menu2" id="lahan-change" data-toggle="tab">Produk Lahan</a></li>
			@endif
			@endif
		</ul>
	</div>
	<div class="col-xs-12 col-sm-10 col-md-10">
		<div class="content-produk-public">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="menu1">
					@if ($produkKG != null)
					@if (count($produkKG) > 0)
					<div class="jualan-barang">

						@foreach ($produkKG as $produk)
						<div class=" col-xs-12 col-sm-6 col-md-4" id="jual-jarak">
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
									<div class="desc">Lorem ipsum dolor sit amet.</div>
									<span class="price">Rp. {{$produk->hargaFix->hargaBuah}}</span>
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
						@endforeach
					</div>
					@endif
					@endif
				</div>
				@if (Auth::check())
				@if (Auth::user()->status_id  == 1 || Auth::user()->status_id  == 0 || Auth::user()->status_id  == 3)
				<div class="tab-pane fade" id="menu2">
					@if ($produkLahan != null)
					@if (count($produkLahan) > 0)
					<div class="jualan-barang">

						@foreach ($produkLahan as $lahan)
						<div class=" col-xs-12 col-sm-6 col-md-4" id="jual-jarak">
							<div class="box-wrapper">
								@if (Auth::check())
								@if (!empty(App\pesanan::where('produkLahan_id',$lahan->id)->first()))
								<div class="booking-lahan">
								</div>
								<h1>Booking</h1>
								@endif
								@endif
								<img src="{{ asset('image/projek/'.$lahan->image) }}" alt="{{$lahan->nama}}" />
								<p>#LAHAN</p>
								<div class="box-content">
									@if (Auth::check())
									@if (Auth::user()->id != $lahan->petani->user->id && Auth::user()->status_id != 3 && Auth::user()->status_id != 0)
									<a href="#!" class="buy" data-toggle="modal" data-target="#buyLahan{{$lahan->id}}"><span><i class="fa fa-cart-plus"></i></span></a>
									@endif
									@endif
									<div class="title"><a href="/produk-Lahan/{{$lahan->slug}}">{{$lahan->nama}}</a></div>
									<div class="desc">Perkiraan : {{$lahan->stokAwal}} - {{$lahan->stokAkhir}} Kg</div>
									<div class="desc">Masa Tanam : {{$lahan->masatanam}}</div>
									<div class="desc">Perkiraan panen : {{$lahan->perkiraanPanen}}</div>
									<div class="desc">Lorem ipsum dolor sit amet.</div>
									<span class="price">Rp. {{$lahan->harga}}</span>
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
						@endforeach
					</div>
					@endif
					@endif
				</div>
				@endif
				@endif
			</div>
		</div>
	</div>

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
						<div class="form-group">
							<input type="number" name="jumlah" placeholder="jumlah pembelian">
						</div>
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
	
	@if ($produkLahan != null)
	
	@if (count($produkLahan) > 0)
	@foreach ($produkLahan as $lahan)
	<!-- Modal -->
	<div id="buyLahan{{$lahan->id}}" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">

			<!-- Modal content-->
			<div class="modal-content" style="font-family: Righteous;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Booking produk {{$lahan->nama}}</h4>
				</div>
				<div class="modal-body">
					<form action="/pesanan/Lahan" method="POST" id="form-buy-kg">
						<p>Booking : Rp {{$lahan->harga/2}} -;</p>
						<div class="form-group">
							<input type="number" name="jumlah" placeholder="jumlah pembelian">
						</div>
						<input type="hidden" name="produkLahan_id" value="{{$lahan->id}}">
						<input type="hidden" name="harga" value="{{$lahan->harga/2}}">
						{{ csrf_field() }}
						<div class="form-group">
							<button type="submit">Booking</button>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
	@endforeach
	@endif
	@endif

	@section('script')
	<script type="text/javascript">
		$('#lahan-change').click(function () {
			$('#type-search').val('lahan');
		});
		$('#kg-change').click(function () {
			$('#type-search').val('kg');
		});

		@if (request()->query('typeProduk') == 'lahan')
		$(function () {
			setTimeout(function () {
				$('#lahan-change').trigger('click');
			},500);
		})
		@endif
		
		
	</script>
	@endsection


	@endsection