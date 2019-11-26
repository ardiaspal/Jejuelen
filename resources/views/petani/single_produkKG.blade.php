@extends('layouts.app')
@section('title', $produk->nama)
@section('content')

<div class="grup-pertanian-kg">
	<div class="bg-color-single-kg">
		<div class="image-produk-kg-single">
			<div class="bg-gradient-color-view"></div>
			<img src="{{ asset('image/projek/'.$produk->image) }}" alt="">
			<div class="tag-jenis-kg">
				<h3>#KG</h3>
			</div>
			<div class="grup-buah-kg">
				<h2>{{$produk->nama}}</h2>
			</div>
		</div>
		<div class="grup-lagi-view-kg">
			<div class="all-grup-single-kg">
				<h3>Harga : Rp. {{$produk->hargaFix->hargaBuah}},- <span>/ Kg</span></h3><br>
				<h3 style="margin: 0;font-size: 20px;margin-bottom: 5px;">Stok : {{$produk->stok}} <span>Kg</span></h3>
				<p>Post By <a href="/petani-profile/{{$produk->petani->user->username}}">{{$produk->petani->name}}</a></p>
			</div>
			@if (Auth::check())
			@if (Auth::user()->id == $produk->petani->user->id)
			<div class="edit-view-produkkg">
				<a href="/produk-edit-kg/{{$produk->id}}">Edit</a>
				<a href="/data-delete-kg/{{$produk->id}}/destroy">Delete</a>
			</div>
			@endif
			@endif
			<div class="keranjang-belanaja">
				@if (Auth::check())
				@if (Auth::user()->id != $produk->petani->user->id && Auth::user()->status_id != 3)
				<form action="/pesanan/kg" method="POST">
					<input type="number" name="jumlah">
					<input type="hidden" name="produkKg_id" value="{{$produk->id}}">
					<input type="hidden" name="harga" value="{{$produk->hargaFix->hargaBuah}}">
					{{ csrf_field() }}
					<button>Tambah <i id="cart-belanja" class="fa fa-shopping-cart" aria-hidden="true"></i></button>
				</form>
				@endif
				@endif
			</div>
			<div class="deskripsi-single-kg">
				<p>{!!$produk->deskripsi!!}</p>

			</div>
		</div>
	</div>
</div>

@endsection