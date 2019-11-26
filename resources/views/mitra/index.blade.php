@extends('layouts.app')
@section('title', $mitra->namaCv)
@section('content')

<div class="profile-umum">
	<div class="col-xs-12 col-md-6 solve-padding-umum" >
		<div class="image-profile-all">
			<img src="{{$mitra->image}}" alt="">
			<p>#Mitra</p>
		</div>
	</div>
	<div class="col-xs-12 col-md-6 solve-padding-umum"  id="mod-prodfile-all">
		<div class="data-diri-profile-all">
			<div class="head-name-profile-all">
				<h1>{{$mitra->namaCv}}</h1>
			</div>
			<div class="detail-aksi-all">
				<div class="transaksi-buy">
					<h2>Transaksi</h2>
					<p>{{$jumlahTransaksi}}</p>
				</div>
				<div class="history-buy">
					<h2>History</h2>
					<p>{{$jumlahHistory}}</p>
				</div>
			</div>
			@if (Auth::check())
			@if (Auth::user()->id == $mitra->user_id)
			<div class="edit-profile-all">
				<a href="/mitra/{{$mitra->id}}/edit">Edit Profile</a>
			</div>
			@endif
			@endif
		</div>
	</div>
</div>

@endsection