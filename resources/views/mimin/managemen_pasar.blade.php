@extends('layouts.app')
@section('title','Managemen Harga')
@section('content')
<div class="managemen-rego-pantes">
	<div class="managemen-tittle">
		<h1>Managemen Rego <span>Fruit</span> pasar</h1>
	</div>
	<div class="image-management">
		<div class="image-posisi-managemen">
			<img src="https://images.unsplash.com/photo-1488459716781-31db52582fe9?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=d060132f422f18d7fd59c4b5d0eb8e06&auto=format&fit=crop&w=750&q=80" alt="">
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
				@for ($i = 0; $i <10 ; $i++)
				<tr>
					<td>{{$i+1}}</td>
					<td>Apel</td>
					<td>10000</td>
					<td class="aksi-managmen">
						<a href="#!">Update</a>
						<a href="#!">Delete</a>
					</td>
				</tr>
				@endfor
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
				<form action="/produk" method="POST">
					<div class="form-group">
						<label class="lable-mod" for="exampleInputEmail1">Nama Buah</label>
						<input type="judul" name="name" class="form-control" value="" id="mod-inputan" placeholder="Nama Buah">
					</div>
					<div class="form-group">
						<label class="lable-mod" for="exampleInputEmail1">Harga/KG</label>
						<input type="judul" name="harga" class="form-control" value="" id="mod-inputan" placeholder="harga">
					</div>
					<button type="submit" class="btn btn-block btn-default">Submit</button>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>

</div>
</div>


@endsection