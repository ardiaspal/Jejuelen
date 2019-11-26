@extends('layouts.app')
@section('title','Admin')
@section('content')

<div class="grup-all-admin-count">
	<div class="col-xs-12 col-sm-4" id="solve-count-padding">
		<a href="/daftar-pembeli">
			<div class="card-count-admin">
				<div class="image-count-icon">
					<i class="fa fa-user-o" aria-hidden="true"></i>
					<p>Pembeli Umum</p>
				</div>
				<div class="count-admin-all">
					<h3>{{count($umums)}}</h3>
				</div>
			</div>
		</a>
	</div>
	<div class="col-xs-12 col-sm-4" id="solve-count-padding">
		<a href="/daftar-petani">
			<div class="card-count-admin">
				<div class="image-count-icon">
					<i class="fa fa-user" aria-hidden="true"></i>
					<p>Petani</p>
				</div>
				<div class="count-admin-all">
					<h3>{{count($petanis)}}</h3>
				</div>
			</div>
		</a>
	</div>
	<div class="col-xs-12 col-sm-4" id="solve-count-padding">
		<a href="/daftar-mitra">
			<div class="card-count-admin">
				<div class="image-count-icon">
					<i class="fa fa-user-secret" aria-hidden="true"></i>
					<p>Pembeli Mitra</p>
				</div>
				<div class="count-admin-all">
					<h3>{{count($mitras)}}</h3>
				</div>
			</div>
		</a>
	</div>
	<div class="col-xs-12 col-sm-4" id="solve-count-padding">
		<a href="/pembayaran-mimin">
			<div class="card-count-admin">
				<div class="image-count-icon">
					<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					<p>Total Transaksi</p>
				</div>
				<div class="count-admin-all">
					<h3>{{count($transaksis)}}</h3>
				</div>
			</div>
		</a>
	</div>
	<div class="col-xs-12 col-sm-4" id="solve-count-padding">
		<a href="/produk">
			<div class="card-count-admin">
				<div class="image-count-icon">
					<i class="fa fa-product-hunt" aria-hidden="true"></i>
					<p>Produk Kg</p>
				</div>
				<div class="count-admin-all">
					<h3>{{count($produkKG)}}</h3>
				</div>
			</div>
		</a>
	</div>
	<div class="col-xs-12 col-sm-4" id="solve-count-padding">
		<a href="/produk">
			<div class="card-count-admin">
				<div class="image-count-icon">
					<i class="fa fa-product-hunt" aria-hidden="true"></i>
					<p>Produk Lahan</p>
				</div>
				<div class="count-admin-all">
					<h3>{{count($produkLahan)}}</h3>
				</div>
			</div>
		</a>
	</div>
</div>

<div class="grup-all-statistik-admin">
	<div class="statistik-rego">
		<div class="head-rego">
			<h1>Statistik <span>Transaksi</span></h1>
		</div>
		<div class="chart-data">
			<canvas id="databuah"></canvas>
		</div>
	</div>
</div>

@section('script')
<script>
	var ctx = document.getElementById("databuah").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: [
			@foreach ($transaksis as $statistik)
			"{{$statistik->created_at->format('d M Y')}}",
			@endforeach
			],
			datasets: [{
				label: '{{$statistik->nama}}',
				data: [
				@foreach ($transaksis as $statistik)
				{{$statistik->totalPembayaran}},
				@endforeach
				],
				backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
				'rgba(54, 162, 235, 0.2)',
				'rgba(255, 206, 86, 0.2)',
				'rgba(75, 192, 192, 0.2)',
				'rgba(153, 102, 255, 0.2)',
				'rgba(255, 159, 64, 0.2)'
				],
				borderColor: [
				'rgba(255,99,132,1)',
				'rgba(54, 162, 235, 1)',
				'rgba(255, 206, 86, 1)',
				'rgba(75, 192, 192, 1)',
				'rgba(153, 102, 255, 1)',
				'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
	});
</script>
@endsection

@endsection