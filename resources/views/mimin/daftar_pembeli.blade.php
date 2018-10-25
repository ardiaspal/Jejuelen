@extends('layouts.app')
@section('title','Daftar Pembeli Umum')
@section('content')
<div class="managemen-rego-pantes">
	<div class="managemen-tittle">
		<h1>Managemen Pembeli <span>Umum</span></h1>
	</div>
	<div class="image-management">
		<div class="image-posisi-managemen">
			<img src="{{ asset('image/belibeli.jpg') }}" alt="">
			<div class="image-gradient"></div>
			<h3>Abelenje le'</h3>
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
					<th>Nama</th>
					<th>Nohp</th>
					<th>Email</th>
					<th>Alamat</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($umums as $umum)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$umum->name}}</td>
					<td>{{$umum->nohp}}</td>
					<td>{{$umum->email}}</td>
					<td>{{$umum->alamat}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>



@endsection