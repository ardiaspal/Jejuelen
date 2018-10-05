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
					<td class="aksi-managmen">
						<a href="#!">Update</a>
						<a href="#!">Delete</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>



@endsection