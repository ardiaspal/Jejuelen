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
		<a href="/petani/{{$petani->id}}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
	</div>
</div>

<!-- Modal KG-->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" id="new-modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" id="title-moda-new">Tambah Produk KG</h4>
			</div>
			<div class="modal-body">
				<form action="/tambah-produk-kg" method="POST">
					<div class="form-group">
						<div class="col-xs-12 col-sm-6" id="solve-grid">
							<label class="lable-mod" for="exampleInputEmail1">Nama Produk</label>
							<select id="select-satuan" name="nama">
								<option style="display: none" disabled selected value></option>
								@foreach ($hargas as $harga)
								<option class="button-select-kg" data-id={{$harga->hargaBuah}}>{{$harga->nama}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-xs-12 col-sm-3" id="solve-grid">
							<label class="lable-mod" for="exampleInputEmail1">Stok</label>
							<input type="judul" name="stok" class="form-control" value="{{ old('stok') }}" id="mod-inputan" placeholder="Stok">
						</div>
						<div class="col-xs-12 col-sm-3" id="solve-grid">
							<label class="lable-mod" for="exampleInputEmail1">Harga</label>
							<input type="kg" name="harga" class="form-control harga_kg" value="{{ old('harga') }}" id="mod-inputan" placeholder="Harga" readonly>
						</div>
					</div>
					<div class="moda-padding">
						<div class="form-group">
							<label class="lable-mod" for="exampleInputEmail1">Foto Produk</label>
							<input type="judul" name="image" class="form-control" value="{{ old('image') }}" id="mod-inputan" placeholder="Foto">
						</div>
						<div class="form-group">
							<label class="lable-mod" for="textarea-tinymce">Deskripsi</label> 
							<textarea name="deskripsi" rows="8" id="textarea-style" placeholder="Deskripsi Produk...">{{ old('deskripsi') }}</textarea>
						</div>
						<button type="submit" class="btn btn-block btn-default">Submit</button>
					</div>
					{{ csrf_field() }}
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>
{{-- end mdoak KG --}}

<!-- Modal Lahan-->
<div class="modal fade" id="myModalLahan" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" id="new-modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" id="title-moda-new">Tambah Produk Lahan</h4>
			</div>
			<div class="modal-body">
				<form action="/tambah-produk-lahan" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<div class="col-xs-12 col-sm-4" id="solve-grid">
							<label class="lable-mod" for="exampleInputEmail1">Nama Produk</label>
							<input type="judul" name="nama" class="form-control" value="{{ old('nama') }}" id="mod-inputan" placeholder="Nama Produk">
						</div>
						<div class="col-xs-12 col-sm-5" id="solve-grid">
							<label class="lable-mod" for="exampleInputEmail1">Range Stok</label>
							<div class="grup-input-stok">
								<div class="col-xs-6">
									<input type="judul" name="stokAwal" class="form-control" value="{{ old('stokAwal') }}" id="mod-inputan" placeholder="Stok Awal">
								</div>
								<div class="col-xs-6">
									<input type="judul" name="stokAkhir" class="form-control" value="{{ old('stokAkhir') }}" id="mod-inputan" placeholder="Stok Akhir">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-3" id="solve-grid">
							<label class="lable-mod" for="exampleInputEmail1">Harga (Administrasi 2000)</label>
							<input type="judul" name="harga" class="form-control" value="{{ old('harga') }}" id="mod-inputan" placeholder="Harga">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-6" id="solve-grid">
							<label class="lable-mod" for="exampleInputEmail1">Masa Tanam</label>
							<input type="text" name="masatanam" class="form-control" value="{{ old('masatanam') }}" id="mod-inputan" placeholder="masa tanam">
						</div>
						<div class="col-xs-12 col-sm-6" id="solve-grid">
							<label class="lable-mod" for="exampleInputEmail1">Perkiraan Panen</label>
							<input type="text" name="perkiraanPanen" class="form-control" value="{{ old('perkiraanPanen') }}" id="mod-inputan" placeholder="perkiraan Panen">
						</div>
					</div>
					<div class="moda-padding">
						<div class="form-group">
							<label class="lable-mod" for="exampleInputEmail1">Foto Produk</label>
							<input type="file" name="image" class="form-control" value="{{ old('image') }}" id="mod-inputan" placeholder="Foto">
						</div>
						<div class="form-group">
							<label class="lable-mod" for="textarea-tinymce">Deskripsi</label> 
							<textarea name="deskripsi" rows="8" id="textarea-style" placeholder="Deskripsi Produk...">{{ old('deskripsi') }}</textarea>
						</div>
						<button type="submit" class="btn btn-block btn-default">Submit</button>
					</div>
					{{ csrf_field() }}
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>
{{-- end modal lahan --}}


<div class="content-jualan">
	<div class="head-title-petani">
		<h1>Produk mu</h1>
	</div>
	<div class="head-tambah-produk">
		<a href="#!"  data-toggle="modal" data-target="#myModal">Tambah Produk KG <i class="fa fa-plus" aria-hidden="true"></i></a>
		<a href="#!"  data-toggle="modal" data-target="#myModalLahan">Tambah Produk Lahan <i class="fa fa-plus" aria-hidden="true"></i></a>
	</div>
@if (count($produks) > 0)
		<div class="jualan-barang">

		@foreach ($produks as $produk)
		<div class=" col-xs-12 col-sm-6 col-md-3" id="jual-jarak">
			<div class="box-wrapper">
				<img src="{{$produk->image}}" alt="{{$produk->nama}}" />
				<p>#KG</p>
				<div class="box-content">
					@if (Auth::check())
					@if ($produk->farmers_id != $petani->id)
					<a href="#!" class="buy"><span><i class="fa fa-cart-plus"></i></span></a>
					@endif
					@endif
					<div class="title">{{$produk->nama}}</div>
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

@if (count($produklahans) > 0)
	<div class="jualan-barang">

		@foreach ($produklahans as $lahan)
		<div class=" col-xs-12 col-sm-6 col-md-3" id="jual-jarak">
			<div class="box-wrapper">
				<img src="{{ asset('image/projek/'.$lahan->image) }}" alt="{{$lahan->nama}}" />
				<p>#LAHAN</p>
				<div class="box-content">
					@if (Auth::check())
					@if ($lahan->farmers_id != $petani->id)
					<a href="#!" class="buy"><span><i class="fa fa-cart-plus"></i></span></a>
					@endif
					@endif
					<div class="title">{{$lahan->nama}}</div>
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
</div>
@endif

@section('script')
<script>
	$(document).ready(function(){
      var date_input=$('input[name="masatanam"]');
      var date_input_new=$('input[name="perkiraanPanen"]'); //our date input has the name "date"
      var options={
      	format: 'dd-mm-yyyy',
      	todayHighlight: true,
      	autoclose: true,
      };
      date_input.datepicker(options);
      date_input_new.datepicker(options);
  })
</script>
@endsection

@endsection