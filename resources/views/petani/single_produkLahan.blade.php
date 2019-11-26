@extends('layouts.app')
@section('title', $produk->nama)
@section('content')

<div class="grup-pertanian-kg">
	<div class="bg-color-single-kg">
		<div class="image-produk-kg-single">
			<div class="bg-gradient-color-view"></div>
			<img src="{{ asset('image/projek/'.$produk->image) }}" alt="">
			<div class="tag-jenis-kg">
				<h3>#Lahan</h3>
			</div>
			<div class="grup-buah-kg">
				<h2>{{$produk->nama}}</h2>
			</div>
		</div>
		<div class="grup-lagi-view-kg">
			<div class="all-grup-single-kg">
				<h3>Harga : Rp. {{$produk->harga}},- <span>/ Lahan</span></h3>
				<p>Post By <a href="/petani-profile/{{$produk->petani->user->username}}">{{$produk->petani->name}}</a></p>
			</div>
			@if (Auth::check())
			@if (Auth::user()->id == $produk->petani->user->id)
			<div class="edit-view-produkkg">
				<a href="#!">Edit</a>
				<a href="#!">Delete</a>
			</div>
			@endif
			@if (empty(App\pesanan::where('produkLahan_id',$produk->id)->first()))
			@if (Auth::user()->id != $produk->petani->user->id && Auth::user()->status_id != 3)
			<div class="keranjang-belanaja-lahan">
				<form action="/pesanan/Lahan" method="POST">
					<input type="number" name="jumlah">
					<input type="hidden" name="produkLahan_id" value="{{$produk->id}}">
					<input type="hidden" name="harga" value="{{$produk->harga/2}}">
					{{ csrf_field() }}
					<button>Booking <i id="cart-belanja" class="fa fa-shopping-cart" aria-hidden="true"></i></button>
					<p style="color: #2a4a5b">Booking : Rp {{$produk->harga/2}} -;</p>
				</form>
			</div>
			@endif
			@endif
			@endif

			<div class="info-detail-lahan table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th colspan="3">Detail Data</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Perkiraan</td>
							<td>:</td>
							<td>{{$produk->stokAwal}} - {{$produk->stokAkhir}} Kg</td>
						</tr>
						<tr>
							<td>Masa Tanam</td>
							<td>:</td>
							<td>{{$produk->masatanam}}</td>
						</tr>
						<tr>
							<td>Perkiraan panen</td>
							<td>:</td>
							<td>{{$produk->perkiraanPanen}}</td>
						</tr>
					</tbody>
				</table>
			{{-- 	<h4>Perkiraan : {{$produk->stokAwal}} - {{$produk->stokAkhir}} Kg</h4>
				<h4>Masa Tanam : {{$produk->masatanam}}</h4>
				<h4>Perkiraan panen : {{$produk->perkiraanPanen}}</h4> --}}
			</div>
			<div class="deskripsi-single-kg">
				<p>{!!$produk->deskripsi!!}</p>
			</div>
		</div>
	</div>
</div>

@endsection