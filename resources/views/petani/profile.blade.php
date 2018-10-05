@extends('layouts.app')
@section('title', $petani->name)
@section('content')

<div class="edit-profile">
	<div class="grup-all-edit-profile">
		<div class="image-form-edit">
			<img src="{{$petani->image}}" alt="">
			{{-- <img src="{{$petani->fotoKtp}}" alt=""> --}}
		</div>
		<div class="form-edit-data">
			<form action="/petani/{{ $petani->id }}" method="POST">
				<div class="form-group">
					<label for="name" style="display: block;">Nama</label>
					<input type="text" name="name" placeholder="name" value="{{ old('name') ? old('name') : $petani->name  }}">
					@if ($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					<label for="name" style="display: block;">image</label>
					<input type="text" name="image" value="{{ old('image') ? old('image') : $petani->image  }}" placeholder="image">
					@if ($errors->has('image'))
					<span class="help-block">
						<strong>{{ $errors->first('image') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					<label for="name" style="display: block;">nohp</label>
					<input type="text" name="nohp" value="{{ old('nohp') ? old('nohp') : $petani->nohp  }}" placeholder="nohp">
					@if ($errors->has('nohp'))
					<span class="help-block">
						<strong>{{ $errors->first('nohp') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					<label for="name" style="display: block;">alamat</label>
					<input type="text" name="alamat" value="{{ old('alamat') ? old('alamat') : $petani->alamat  }}" placeholder="alamat">
					@if ($errors->has('alamat'))
					<span class="help-block">
						<strong>{{ $errors->first('alamat') }}</strong>
					</span>
					@endif
				</div>
				<label for="title" class="text-create-event" style="display: block;">Status Hidup</label>
				<label class="radio-inline">
					<input type="radio" name="status_hidup" {{strcasecmp($petani->status, 'menikah') == 0  ? 'checked="checked"' : ''}}  value="menikah">menikah
				</label>
				<label class="radio-inline">
					<input type="radio" name="status_hidup" {{strcasecmp($petani->status, 'single') == 0  ? 'checked="checked"' : ''}} value="single">single
				</label>		
				<div class="form-group">
					<label for="name" style="display: block;">email</label>
					<input type="text" name="email" value="{{ old('email') ? old('email') : $petani->email  }}" placeholder="email">
					@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					<label for="name" style="display: block;">nik</label>
					<input type="text" name="nik" value="{{ old('nik') ? old('nik') : $petani->nik  }}" placeholder="nik">
					@if ($errors->has('nik'))
					<span class="help-block">
						<strong>{{ $errors->first('nik') }}</strong>
					</span>
					@endif
				</div>
				<label for="title" class="text-create-event" style="display: block;">Jenis Kelamin</label>
				<label class="radio-inline">
					<input type="radio" name="jenisKelamin" {{strcasecmp($petani->jenisKelamin, 'laki-laki') == 0  ? 'checked="checked"' : ''}}   value="laki-laki">Laki-laki
				</label>
				<label class="radio-inline">
					<input type="radio" name="jenisKelamin" {{strcasecmp($petani->jenisKelamin, 'perempuan') == 0  ? 'checked="checked"' : ''}}  value="perempuan">Perempuan
				</label>
				<div class="form-group">
					<label for="name" style="display: block;">agama</label>
					<input type="text" name="agama" value="{{ old('agama') ? old('agama') : $petani->agama  }}" placeholder="agama">
					@if ($errors->has('agama'))
					<span class="help-block">
						<strong>{{ $errors->first('agama') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					<label for="name" style="display: block;">kewarganegaraan</label>
					<input type="text" name="kewarganegaraan" value="{{ old('kewarganegaraan') ? old('kewarganegaraan') : $petani->kewarganegaraan  }}" placeholder="kewarganegaraan">
					@if ($errors->has('kewarganegaraan'))
					<span class="help-block">
						<strong>{{ $errors->first('kewarganegaraan') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					<label for="name" style="display: block;">ttl</label>
					<input type="text" name="ttl" value="{{ old('ttl') ? old('ttl') : $petani->ttl  }}" placeholder="ttl">
					@if ($errors->has('ttl'))
					<span class="help-block">
						<strong>{{ $errors->first('ttl') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					<label for="name" style="display: block;">fotoKtp</label>
					<input type="text" name="fotoKtp" value="{{ old('fotoKtp') ? old('fotoKtp') : $petani->fotoKtp  }}" placeholder="fotoKtp">
					@if ($errors->has('fotoKtp'))
					<span class="help-block">
						<strong>{{ $errors->first('fotoKtp') }}</strong>
					</span>
					@endif
				</div>
				{{ csrf_field() }}
				<input type="hidden" name="_method"  value="PUT">
				<button type="submit" id="edit-profile">Edit Profile</button>
			</form>
		</div>
	</div>
	<div class="pohon-satu">
		<img src="{{ asset('image/icon/pohon 4.png') }}" alt="">
	</div>
	<div class="pohon-dua">
		<img src="{{ asset('image/icon/pohon.png') }}" alt="">
	</div>
</div>

@endsection