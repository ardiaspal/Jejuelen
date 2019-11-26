@extends('layouts.app')
@section('title', $petani->name)
@section('content')
{{-- masalah farmer id, petani bisa memasukkan harga sendiri yang lahan apa kayak kg --}}
<div class="profile-petani">
	<div class="grup-petani-profile">
		<div class="image-content-petani">
			<img src="{{ $petani->image }}" alt="">
		</div>
		<div class="data-diri-petani">
			<div class="name-petani">
				<h2>{{$petani->name}}</h2>
				<p>Email: {{$petani->email}}</p>
				<p>Alamat: {{$petani->alamat}}</p>
				<p>No: {{$petani->nohp}}</p>
			</div>
		</div>
	</div>
</div>

<div class="content-jualan">
	<div class="head-title-petani">
		<h1>Produk mu</h1>
	</div>

	@if (count($produks) > 0)
	<div class="jualan-barang">

		@foreach ($produks as $produk)
		<div class=" col-xs-12 col-sm-6 col-md-3" id="jual-jarak">
			<div class="box-wrapper">
				@if ($produk->stok == 0)
				<div class="stok-kosong-profile">
					<h2>STOK KOSONG</h2>
				</div>
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

	@if (count($produklahans) > 0)
	<div class="jualan-barang">

		@foreach ($produklahans as $lahan)
		<div class=" col-xs-12 col-sm-6 col-md-3" id="jual-jarak">
			<div class="box-wrapper">
				@if (!empty(App\pesanan::where('produkLahan_id',$lahan->id)->first()))
				<div class="booking-lahan">
				</div>
				<h1>Booking</h1>
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
					<div class="desc">By <a style="color: #2a4a5b;text-decoration: none;" href="/petani-profile/{{$lahan->petani->user->username}}">{{$lahan->petani->name}}</a></div>
					<span class="price">Rp. {{$lahan->harga}}</span>
					<div class="footer">
						<ul>
							<li style="color: #2a4a5b;">
								@if ($lahan->created_at == $lahan->updated_at)
								{{ $lahan->created_at->diffForHumans()}}
								@else
								[Update] {{ $lahan->updated_at->diffForHumans()}}
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
</div>
@endif

@if (Auth::check())


@if ($produks != null)
@if (count($produks) > 0)
@foreach ($produks as $produk)
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

@if ($produklahans != null)

@if (count($produklahans) > 0)
@foreach ($produklahans as $lahan)
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


@endif

@endsection