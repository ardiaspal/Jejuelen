@extends('layouts.app')
@section('title','Daftar Petani')
@section('content')
<div class="managemen-rego-pantes">
	<div class="managemen-tittle">
		<h1>Managemen <span>Petani</span></h1>
	</div>
	<div class="image-management">
		<div class="image-posisi-managemen">
			<img src="{{ asset('image/petani.jpg') }}" alt="">
			<div class="image-gradient"></div>
			<h3>Petani Jaya</h3>
			<div class="jejuwelenlogo">
				<a href="/">Jejuelen.com</a>
			</div>

		</div>
	</div>
</div>
<div class="content-managemen-rego">
	<div class="button-create-harga">
		<a href="#!"  data-toggle="modal" data-target="#myModal">Registrasi Petani</a>
	</div>
	<div class="table-rego table-responsive">
		<table class="table table-striped" id="color-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Nohp</th>
					<th>Email</th>
					<th>Nik</th>
					<th>Jenis Kelamin</th>
					<th>Status</th>
					<th>Agama</th>
					<th>ttl</th>
					<th>Kewarganegaraan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($petanis as $petani)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$petani->name}}</td>
					<td>{{$petani->nohp}}</td>
					<td>{{$petani->email}}</td>
					<td>{{$petani->nik}}</td>
					<td>{{$petani->jenisKelamin}}</td>
					<td>{{$petani->status}}</td>
					<td>{{$petani->agama}}</td>
					<td>{{$petani->ttl}}</td>
					<td>{{$petani->kewarganegaraan}}</td>
					<td class="aksi-managmen">
						<a href="#!"  data-toggle="modal" data-target="#editModal{{$petani->id}}">Update</a>
						<a href="#!">Delete</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" id="new-modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" id="title-moda-new">Registrasi Petani</h4>
			</div>
			<div class="modal-body">
				<form method="POST" action="/register-petani">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="title">Nama</label>
						<input type="text" name="name" class="form-control" placeholder="nama" value="{{ old('name') }}" required>
						@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title">username</label>
						<input type="text" name="username" class="form-control" placeholder="username" value="{{ old('username') }}" required>
						@if ($errors->has('username'))
						<span class="help-block">
							<strong>{{ $errors->first('username') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title" class="text-create-event">Alamat</label>
						<input type="text" name="alamat" class="form-control" placeholder="alamat" value="{{ old('alamat') }}" required>
						@if ($errors->has('alamat'))
						<span class="help-block">
							<strong>{{ $errors->first('alamat') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title" class="text-create-event">Nik</label>
						<input type="text" name="nik" class="form-control" placeholder="nik" value="{{ old('nik') }}" required>
						@if ($errors->has('nik'))
						<span class="help-block">
							<strong>{{ $errors->first('nik') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title" class="text-create-event">Nohp</label>
						<input type="text" name="nohp" class="form-control" placeholder="nohp" value="{{ old('nohp') }}" required>
						@if ($errors->has('nohp'))
						<span class="help-block">
							<strong>{{ $errors->first('nohp') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title" class="text-create-event">Email</label>
						<input type="email" name="email" class="form-control" placeholder="email" value="{{ old('email') }}" required>
						@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title" class="text-create-event">Agama</label>
						<input type="text" name="agama" placeholder="Agama" class="form-control" value="{{ old('agama') }}" required>
						@if ($errors->has('agama'))
						<span class="help-block">
							<strong>{{ $errors->first('agama') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title" class="text-create-event" style="display: block;">Status Hidup</label>
						<label class="radio-inline">
							<input type="radio" name="status_hidup" value="menikah">menikah
						</label>
						<label class="radio-inline">
							<input type="radio" name="status_hidup" value="single">single
						</label>
					</div>
					<div class="form-group">
						<label style="display: block;" for="title" class="text-create-event">Kewarganegaraan</label>
						<input type="text" name="kewarganegaraan" class="form-control" value="{{ old('kewarganegaraan') }}" placeholder="indonesia" required>
						@if ($errors->has('kewarganegaraan'))
						<span class="help-block">
							<strong>{{ $errors->first('kewarganegaraan') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title" class="text-create-event">TTL</label>
						<input type="text" name="ttl" class="form-control" value="{{ old('ttl') }}" placeholder="25-08-1996">
						@if ($errors->has('ttl'))
						<span class="help-block">
							<strong>{{ $errors->first('ttl') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title" class="text-create-event" style="display: block;">Jenis Kelamin</label>
						<label class="radio-inline">
							<input type="radio" name="jenisKelamin" value="laki-laki">Laki-laki
						</label>
						<label class="radio-inline">
							<input type="radio" name="jenisKelamin" value="perempuan">Perempuan
						</label>
					</div>
					<div class="form-group">
						<label for="title" class="text-create-event" style="display: block;">Foto Ktp</label>
						<input type="text" name="fotoKtp" class="form-control" value="{{ old('fotoKtp') }}"   placeholder="foto.jpg">
						@if ($errors->has('fotoKtp'))
						<span class="help-block">
							<strong>{{ $errors->first('fotoKtp') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title" class="text-create-event">Password</label>
						<input type="password" name="password" class="form-control" placeholder="password" required>
						@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title" class="text-create-event">Confirm Password</label>
						<input type="password" class="form-control" name="password_confirmation" required>
					</div>
					<input type="hidden" name="type" class="form-control" value="petani" placeholder="alamat">
					<button type="submit" class="btn btn-block btn-default">Submit</button>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>


<!--edit Modal -->
@foreach ($petanis as $petani)
<div class="modal fade" id="editModal{{$petani->id}}" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" id="new-modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" id="title-moda-new">Registrasi Petani</h4>
			</div>
			<div class="modal-body">
				<form method="POST" action="/register-petani">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="title">Nama</label>
						<input type="text" name="name" class="form-control" placeholder="nama" value="{{ old('name') ? old('name') :$petani->name }}" required>
						@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title">username</label>
						<input type="text" name="username" class="form-control" placeholder="username" value="{{ old('username') ? old('username') :$petani->username }}" required>
						@if ($errors->has('username'))
						<span class="help-block">
							<strong>{{ $errors->first('username') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title" class="text-create-event">Alamat</label>
						<input type="text" name="alamat" class="form-control" placeholder="alamat" value="{{ old('alamat') ? old('alamat') :$petani->alamat }}" required>
						@if ($errors->has('alamat'))
						<span class="help-block">
							<strong>{{ $errors->first('alamat') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title" class="text-create-event">Nik</label>
						<input type="text" name="nik" class="form-control" placeholder="nik" value="{{ old('nik') ? old('nik') :$petani->nik }}" required>
						@if ($errors->has('nik'))
						<span class="help-block">
							<strong>{{ $errors->first('nik') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title" class="text-create-event">Nohp</label>
						<input type="text" name="nohp" class="form-control" placeholder="nohp" value="{{ old('nohp') ? old('nohp') :$petani->nohp }}" required>
						@if ($errors->has('nohp'))
						<span class="help-block">
							<strong>{{ $errors->first('nohp') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title" class="text-create-event">Email</label>
						<input type="email" name="email" class="form-control" placeholder="email" value="{{ old('email') ? old('email') :$petani->email}}" required>
						@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title" class="text-create-event">Agama</label>
						<input type="text" name="agama" placeholder="Agama" class="form-control" value="{{ old('agama') ? old('agama') :$petani->agama }}" required>
						@if ($errors->has('agama'))
						<span class="help-block">
							<strong>{{ $errors->first('agama') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title" class="text-create-event" style="display: block;">Status Hidup</label>
						<label class="radio-inline">
							<input type="radio" name="status_hidup" value="menikah">menikah
						</label>
						<label class="radio-inline">
							<input type="radio" name="status_hidup" value="single">single
						</label>
					</div>
					<div class="form-group">
						<label style="display: block;" for="title" class="text-create-event">Kewarganegaraan</label>
						<input type="text" name="kewarganegaraan" class="form-control" value="{{ old('kewarganegaraan') ? old('kewarganegaraan') :$petani->kewarganegaraan }}" placeholder="indonesia" required>
						@if ($errors->has('kewarganegaraan'))
						<span class="help-block">
							<strong>{{ $errors->first('kewarganegaraan') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title" class="text-create-event">TTL</label>
						<input type="text" name="ttl" class="form-control" value="{{ old('ttl') ? old('ttl') :$petani->ttl }}" placeholder="25-08-1996">
						@if ($errors->has('ttl'))
						<span class="help-block">
							<strong>{{ $errors->first('ttl') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title" class="text-create-event" style="display: block;">Jenis Kelamin</label>
						<label class="radio-inline">
							<input type="radio" name="jenisKelamin" value="laki-laki">Laki-laki
						</label>
						<label class="radio-inline">
							<input type="radio" name="jenisKelamin" value="perempuan">Perempuan
						</label>
					</div>
					<div class="form-group">
						<label for="title" class="text-create-event" style="display: block;">Foto Ktp</label>
						<input type="text" name="fotoKtp" class="form-control" value="{{ old('fotoKtp') ? old('fotoKtp') :$petani->fotoKtp }}"   placeholder="foto.jpg">
						@if ($errors->has('fotoKtp'))
						<span class="help-block">
							<strong>{{ $errors->first('fotoKtp') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title" class="text-create-event">Password</label>
						<input type="password" name="password" class="form-control" placeholder="password" required>
						@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="title" class="text-create-event">Confirm Password</label>
						<input type="password" class="form-control" name="password_confirmation" required>
					</div>
					<input type="hidden" name="type" class="form-control" value="petani" placeholder="alamat">
					<button type="submit" class="btn btn-block btn-default">Submit</button>
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