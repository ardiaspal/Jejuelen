@extends('layouts.app')
@section('title','Daftar Pembeli Mitra')
@section('content')
<div class="managemen-rego-pantes">
	<div class="managemen-tittle">
		<h1>Managemen Pembeli <span>Mitra</span></h1>
	</div>
	<div class="image-management">
		<div class="image-posisi-managemen">
			<img src="{{ asset('image/kerjasama.jpg') }}" alt="">
			<div class="image-gradient"></div>
			<h3>Kerjasama</h3>
			<div class="jejuwelenlogo">
				<a href="/">Jejuelen.com</a>
			</div>

		</div>
	</div>
</div>
<div class="content-managemen-rego">

	<div class="table-rego table-responsive">
		<table class="table table-striped" id="color-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama CV</th>
					<th>Nohp</th>
					<th>Email</th>
					<th>Alamat</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($mitras as $mitra)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$mitra->namaCv}}</td>
					<td>{{$mitra->nohp}}</td>
					<td>{{$mitra->email}}</td>
					<td>{{$mitra->alamat}}</td>
					<td>{{$mitra->user->status}}</td>
					<td class="aksi-managmen">
						<a href="#!" data-toggle="modal" data-target="#myModalEdit{{$mitra->id}}">Update</a>
						<a href="#!">Delete</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<!-- Modal edit-->
@foreach ($mitras as $mitra)
<div class="modal fade" id="myModalEdit{{$mitra->id}}" role="dialog">
	<div class="modal-dialog modal-sm">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" id="new-modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" id="title-moda-new">Edit Status Mitra</h4>
			</div>
			<div class="modal-body">
				<form action="/edit-harga-buah/{{$mitra->id}}" method="POST">
					<div class="form-group">
						<label class="lable-mod" for="exampleInputEmail1">Nama Cv</label>
						<input type="judul" name="namaCv" readonly class="form-control" value="{{ old('namaCv') ? old('namaCv') : $mitra->namaCv  }}" id="mod-inputan" placeholder="Nama Buah" required>
					</div>
					<div class="form-group">
						<label class="lable-mod" for="exampleInputEmail1">Status</label>
						<select id="select-satuan" name="nama">
							<option style="display: none" disabled selected value></option>
							<option class="button-select-kg" {{strcasecmp($mitra->user->status, 'setuju') == 0  ? 'selected' : ''}}>setuju</option>
							<option class="button-select-kg" {{strcasecmp($mitra->user->status, 'tidak') == 0  ? 'selected' : ''}}>tidak</option>
						</select>
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