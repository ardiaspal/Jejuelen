@extends('layouts.app')
@section('title', $umum->name)
@section('content')
<div class="edit-profile">
	<div class="grup-all-edit-profile">
		<div class="image-form-edit">
			<img src="{{$umum->image}}" alt="">
			{{-- <img src="{{$umum->fotoKtp}}" alt=""> --}}
		</div>
		<div class="form-edit-data">
			<form action="/umum/{{ $umum->id }}" method="POST">
				<div class="form-group">
					<label for="name" style="display: block;">Nama</label>
					<input type="text" name="name" placeholder="name" value="{{ old('name') ? old('name') : $umum->name  }}">
					@if ($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					<label for="name" style="display: block;">image</label>
					<input type="text" name="image" value="{{ old('image') ? old('image') : $umum->image  }}" placeholder="image">
					@if ($errors->has('image'))
					<span class="help-block">
						<strong>{{ $errors->first('image') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					<label for="name" style="display: block;">nohp</label>
					<input type="text" name="nohp" value="{{ old('nohp') ? old('nohp') : $umum->nohp  }}" placeholder="nohp">
					@if ($errors->has('nohp'))
					<span class="help-block">
						<strong>{{ $errors->first('nohp') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					<label for="name" style="display: block;">alamat</label>
					<input type="text" name="alamat" value="{{ old('alamat') ? old('alamat') : $umum->alamat  }}" placeholder="alamat">
					@if ($errors->has('alamat'))
					<span class="help-block">
						<strong>{{ $errors->first('alamat') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					<label for="name" style="display: block;">email</label>
					<input type="text" name="email" value="{{ old('email') ? old('email') : $umum->email  }}" placeholder="email">
					@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
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
		<img src="{{ asset('image/icon/pohon 5.png') }}" alt="">
	</div>
</div>
@endsection