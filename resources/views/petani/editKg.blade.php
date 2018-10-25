@extends('layouts.app')
@section('title', $produk->nama)
@section('content')

<div class="content-edit-kg-new">
	<div class="image-content-edit-kg">
		<img src="{{ asset('image/projek/'.$produk->image) }}" alt="">
		<h1>Edit Produk <span>{{$produk->nama}}</span></h1>
	</div>
	<form action="/data-edit-kg/{{$produk->id}}" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<div class="col-xs-12 col-sm-6" id="solve-grid">
				<label class="lable-mod" for="exampleInputEmail1">Nama Produk</label>
				<select id="select-satuan" name="nama">
					<option style="display: none" disabled selected value></option>
					@foreach ($hargas as $harga)
					<option {{strcasecmp($produk->nama, $harga->nama) == 0  ? 'selected' : ''}} class="button-select-kg" data-id={{$harga->hargaBuah}}>{{$harga->nama}}</option>
					@endforeach
				</select>
			</div>
			<div class="col-xs-12 col-sm-3" id="solve-grid">
				<label class="lable-mod" for="exampleInputEmail1">Stok</label>
				<input type="judul" name="stok" class="form-control" value="{{ old('stok') ? old('stok') : $produk->stok }}" id="mod-inputan" placeholder="Stok">
			</div>
			<div class="col-xs-12 col-sm-3" id="solve-grid">
				<label class="lable-mod" for="exampleInputEmail1">Harga</label>
				<input type="kg" name="harga" class="form-control harga_kg" value="{{ old('harga') ? old('harga') : $produk->hargaFix->hargaBuah}}" id="mod-inputan" placeholder="Harga" readonly>
			</div>
		</div>
		<div class="moda-padding">
			<div class="form-group">
				<label class="lable-mod" for="exampleInputEmail1">Foto Produk</label>
				<input type="file" name="image" class="form-control" value="{{ old('image') ? old('image') : asset('image/projek/'.$produk->image) }}" id="mod-inputan" placeholder="Foto">
			</div>
			<div class="form-group">
				<label class="lable-mod" for="textarea-tinymce">Deskripsi</label> 
				<textarea name="deskripsi" rows="12" id="comment-tinymce" placeholder="Deskripsi Produk...">{{ old('deskripsi') ? old('deskripsi') : $produk->deskripsi }}</textarea>
			</div>
			{{ csrf_field() }}
			<input type="hidden" name="_method"  value="PUT">
			<button type="submit" class="btn btn-block btn-default">Submit</button>
		</div>
		{{ csrf_field() }}
	</form>
</div>
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