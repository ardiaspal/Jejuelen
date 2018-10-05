@extends('layouts.app')
@section('title','Managemen Harga')
@section('content')
<div class="managemen-rego-pantes">
	<div class="managemen-tittle">
		<h1>Managemen Rego <span>Fruit</span> pasar</h1>
	</div>
	<div class="image-management">
		<div class="image-posisi-managemen">
			<img src="{{ asset('image/harga .jpg') }}" alt="">
			<div class="image-gradient"></div>
			<h3>Rego Pantes</h3>
			<div class="jejuwelenlogo">
				<a href="/">Jejuelen.com</a>
			</div>

		</div>
	</div>
</div>
<div class="content-managemen-rego">
	<div class="button-create-harga">
		<a href="#!"  data-toggle="modal" data-target="#myModal">Tambah Harga</a>
	</div>
	<div class="table-rego table-responsive">
		<table class="table table-striped" id="color-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Harga Buah/Kg</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($hargas as $harga)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$harga->nama}}</td>
					<td>{{$harga->hargaBuah}}</td>
					<td class="aksi-managmen">
						<a href="#!" data-toggle="modal" data-target="#myModalEdit{{$harga->id}}">Update</a>
						<a href="/hapus-harga-buah/{{$harga->id}}/destroy">Delete</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-sm">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" id="new-modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" id="title-moda-new">Tambah Reego Buah</h4>
			</div>
			<div class="modal-body">
				<form action="/tambah-harga-buah" method="POST">
					<div class="form-group">
						<label class="lable-mod" for="exampleInputEmail1">Nama Buah</label>
						<input type="judul" name="nama" class="form-control" value="{{ old('nama') }}" id="mod-inputan" placeholder="Nama Buah" required>
					</div>
					<div class="form-group">
						<label class="lable-mod" for="exampleInputEmail1">Harga/KG</label>
						<input type="judul" name="harga" class="form-control" value="{{ old('harga') }}" id="mod-inputan" placeholder="harga" required>
					</div>
					<button type="submit" class="btn btn-block btn-default">Submit</button>
					{{ csrf_field() }}
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal edit-->
@foreach ($hargas as $harga)
<div class="modal fade" id="myModalEdit{{$harga->id}}" role="dialog">
	<div class="modal-dialog modal-sm">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" id="new-modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" id="title-moda-new">Edit Reego Buah</h4>
			</div>
			<div class="modal-body">
				<form action="/edit-harga-buah/{{$harga->id}}" method="POST">
					<div class="form-group">
						<label class="lable-mod" for="exampleInputEmail1">Nama Buah</label>
						<input type="judul" name="nama" class="form-control" value="{{ old('name') ? old('name') : $harga->nama  }}" id="mod-inputan" placeholder="Nama Buah" required>
					</div>
					<div class="form-group">
						<label class="lable-mod" for="exampleInputEmail1">Harga/KG</label>
						<input type="judul" name="harga" class="form-control" value="{{ old('name') ? old('name') : $harga->hargaBuah  }}" id="mod-inputan" placeholder="harga" required>
					</div>
					<button type="submit" class="btn btn-block btn-default">Submit</button>
					{{ csrf_field() }}
					<input type="hidden" name="_method"  value="PUT">
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endforeach


@endsection