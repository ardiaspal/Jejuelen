@extends('layouts.app')
@section('title','Statistik Harga Buah '.$statistik->nama)
@section('content')

<div class="statistik-rego">
	<div class="head-rego">
		<h1>Statistik Harga Buah <span>{{$statistik->nama}}</span></h1>
	</div>
	<div class="chart-data">
		<canvas id="databuah"></canvas>
	</div>
</div>

@section('script')
<script>
	var ctx = document.getElementById("databuah").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: [
			@foreach ($statistiks as $statistik)
			"{{$statistik->created_at->format('d M Y')}}",
			@endforeach
			],
			datasets: [{
				label: '{{$statistik->nama}}',
				data: [
				@foreach ($statistiks as $statistik)
				{{$statistik->hargaBuah}},
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