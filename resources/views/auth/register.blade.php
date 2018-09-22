<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jejuelen - Register</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">

</head>
<body>

    <div class="backgroun-register">
        <div class="col-md-4" id="left-regis">
            <div class="relatif-img">
              <i class="fa fa-times" aria-hidden="true"></i>
              <div class="image-work">
                <a href="#!" id="just-buy">
                    <h3>Just Buy</h3>
                </a>
                <div class="icon-img">
                    <a href="/">
                        /home
                    </a>
                </div>
                <div class="form-isi-buy">
                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-group" id="form-isian">
                            <label for="title">Nama</label>
                            <input type="text" name="name" class="form-control" placeholder="nama" value="{{ old('name') }}" required>
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif 
                            <label for="title">username</label>
                            <input type="text" name="username" class="form-control" placeholder="username" value="{{ old('username') }}" required>
                            @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                            @endif
                            <label for="title" class="text-create-event">Alamat</label>
                            <input type="text" name="alamat" class="form-control" placeholder="alamat" value="{{ old('alamat') }}" required>
                            @if ($errors->has('alamat'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alamat') }}</strong>
                            </span>
                            @endif
                            <label for="title" class="text-create-event">Nik</label>
                            <input type="text" name="nik" class="form-control" placeholder="nik" value="{{ old('nik') }}" required>
                            @if ($errors->has('nik'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nik') }}</strong>
                            </span>
                            @endif
                            <label for="title" class="text-create-event">Nohp</label>
                            <input type="text" name="nohp" class="form-control" placeholder="nohp" value="{{ old('nohp') }}" required>
                            @if ($errors->has('nohp'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nohp') }}</strong>
                            </span>
                            @endif
                            <label for="title" class="text-create-event">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                            <label for="title" class="text-create-event">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="password" required>
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                            <label for="title" class="text-create-event">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" required>

                            <input type="hidden" name="type" class="form-control" value="umum" placeholder="alamat">
                        </div>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4" id="center-regis">
        <div class="relatif-img-petani">
          <i class="fa fa-times" aria-hidden="true"></i>
          <div class="image-work">
            <a href="#!" id="Petani">
                <h3>Farmer</h3>
            </a>
            <div class="icon-img">
                <a href="/">
                    /home
                </a>
            </div>
            <div class="form-isi-farmer">
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group" id="form-isian">
                        <label for="title">Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="nama" value="{{ old('name') }}" required>
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                        <label for="title">username</label>
                        <input type="text" name="username" class="form-control" placeholder="username" value="{{ old('username') }}" required>
                        @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                        <label for="title" class="text-create-event">Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="alamat" value="{{ old('alamat') }}" required>
                        @if ($errors->has('alamat'))
                        <span class="help-block">
                            <strong>{{ $errors->first('alamat') }}</strong>
                        </span>
                        @endif
                        <label for="title" class="text-create-event">Nik</label>
                        <input type="text" name="nik" class="form-control" placeholder="nik" value="{{ old('nik') }}" required>
                        @if ($errors->has('nik'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nik') }}</strong>
                        </span>
                        @endif
                        <label for="title" class="text-create-event">Nohp</label>
                        <input type="text" name="nohp" class="form-control" placeholder="nohp" value="{{ old('nohp') }}" required>
                        @if ($errors->has('nohp'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nohp') }}</strong>
                        </span>
                        @endif
                        <label for="title" class="text-create-event">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                        <label for="title" class="text-create-event">Agama</label>
                        <input type="text" name="agama" placeholder="Agama" class="form-control" value="{{ old('agama') }}" required>
                        @if ($errors->has('agama'))
                        <span class="help-block">
                            <strong>{{ $errors->first('agama') }}</strong>
                        </span>
                        @endif
                        <label for="title" class="text-create-event" style="display: block;">Status Hidup</label>
                        <label class="radio-inline">
                            <input type="radio" name="status_hidup" value="menikah">menikah
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status_hidup" value="single">single
                        </label>
                        <label style="display: block;" for="title" class="text-create-event">Kewarganegaraan</label>
                        <input type="text" name="kewarganegaraan" class="form-control" value="{{ old('kewarganegaraan') }}" placeholder="indonesia" required>
                        @if ($errors->has('kewarganegaraan'))
                        <span class="help-block">
                            <strong>{{ $errors->first('kewarganegaraan') }}</strong>
                        </span>
                        @endif
                        <label for="title" class="text-create-event">TTL</label>
                        <input type="text" name="ttl" class="form-control" value="{{ old('ttl') }}" placeholder="25-08-1996">
                        @if ($errors->has('ttl'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ttl') }}</strong>
                        </span>
                        @endif
                        <label for="title" class="text-create-event" style="display: block;">Jenis Kelamin</label>
                        <label class="radio-inline">
                            <input type="radio" name="jenisKelamin" value="laki-laki">Laki-laki
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="jenisKelamin" value="perempuan">Perempuan
                        </label>
                        <label for="title" class="text-create-event" style="display: block;">Foto Ktp</label>
                        <input type="text" name="fotoKtp" class="form-control" value="{{ old('fotoKtp') }}"   placeholder="foto.jpg">
                        @if ($errors->has('fotoKtp'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fotoKtp') }}</strong>
                        </span>
                        @endif
                        <label for="title" class="text-create-event">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="password" required>
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                        <label for="title" class="text-create-event">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" required>

                        <input type="hidden" name="type" class="form-control" value="petani" placeholder="alamat">
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-4" id="right-regis">
    <div class="relatif-img-mitra" id="right-side">
        <i class="fa fa-times" aria-hidden="true"></i>
        <div class="image-work">
            <a href="#!" id="mitra-js">
               <h3>As Mitra</h3>
           </a>
           <div class="icon-img">
            <a href="/">
                /home
            </a>
        </div>
        <div class="form-isi-buy-right">
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="form-group" id="form-isian">
                    <label for="title">username</label>
                    <input type="text" name="username" class="form-control" placeholder="username" value="{{ old('username') }}" required>
                    @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                    @endif
                    <label for="title">Nama Cv</label>
                    <input type="text" name="namaCv" class="form-control" placeholder="nama" value="{{ old('namaCv') }}" required>
                    @if ($errors->has('nameCv'))
                    <span class="help-block">
                        <strong>{{ $errors->first('namaCv') }}</strong>
                    </span>
                    @endif
                    <label for="title" class="text-create-event">Alamat</label>
                    <input type="text" name="alamat" class="form-control" placeholder="alamat" value="{{ old('alamat') }}" required>
                    @if ($errors->has('alamat'))
                    <span class="help-block">
                        <strong>{{ $errors->first('alamat') }}</strong>
                    </span>
                    @endif
                    <label for="title" class="text-create-event">Nohp</label>
                    <input type="text" name="nohp" class="form-control" placeholder="nohp" value="{{ old('nohp') }}" required>
                    @if ($errors->has('nohp'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nohp') }}</strong>
                    </span>
                    @endif
                    <label for="title" class="text-create-event">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                    <label for="title" class="text-create-event">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="password" required>
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                    <label for="title" class="text-create-event">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" required>
                    <input type="hidden" name="type" class="form-control" value="mitra" placeholder="alamat">
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>

<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('js/javascript.js') }}"></script>
</body>
</html>
