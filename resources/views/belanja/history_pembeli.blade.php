@extends('layouts.app')
@section('title', 'History')
@section('content')

<div class="grup-pembayaran">
	<h2>#History Pembelian</h2>
	
	<div class="grup-all-history">
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Detail</th>
						<th>Pemabayaran</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($historys as $history)
					@if ($history->produkLahan_id == null)
					<tr>
						<td>{{$no++}}</td>
						<td>
							<div class="grup-image-history">
								<img style="width: 100%; height: 100%;" src="{{ asset('image/projek/'.$history->pesanan->produkKG->image) }}" alt="">
							</div>
							<div class="grup-detail-pesanan">
								<h1><a href="/produk-KG/{{$history->pesanan->produkKG->slug}}">{{$history->pesanan->produkKG->nama}}</a></h1>
								<p>By <a href="/petani-profile/{{$history->pesanan->produkKG->petani->user->username}}">{{$history->pesanan->produkKG->petani->name}}</a></p>
							</div>
						</td>
						<td>
							<p style="margin-bottom: 0">Pembayaran : {{$history->jumlah}}</p>
							<p>Harga Total : {{$history->hargaTot}}</p>
						</td>
						<td>
							<p style="margin-bottom: 0">{{$history->pembayaran->created_at->format('d-M-Y')}}</p>
							<p>{{ $history->pembayaran->created_at->diffForHumans()}}</p>
						</td>
						<td>
							@if ($history->status_pembayaran == "verifikasi")
							<h4>Sedang di Proses</h4>
							@elseif($history->status_pembayaran == "pengiriman")
							<h4>Proses Pengiriman</h4>
							@else
							<h4>Produk Telah sampai</h4>
							@endif
						</td>
					</tr>
					@else
					<tr>
						<td>{{$no++}}</td>
						<td>
							<div class="grup-image-history">
								<img style="width: 100%; height: 100%;" src="{{ asset('image/projek/'.$history->pesanan->produkLahan->image) }}" alt="">
							</div>
							<div class="grup-detail-pesanan">
								<h1><a href="/produk-Lahan/{{$history->pesanan->produkLahan->slug}}">{{$history->pesanan->produkLahan->nama}}</a></h1>
								<p>By <a href="/petani-profile/{{$history->pesanan->produkLahan->petani->user->username}}">{{$history->pesanan->produkLahan->petani->name}}</a></p>
							</div>
						</td>
						<td>
							<p style="margin-bottom: 0">Pembayaran Lahan : {{$history->jumlah}}</p>
						</td>
						<td>
							<p style="margin-bottom: 0">{{$history->pembayaran->created_at->format('d-M-Y')}}</p>
							<p>{{ $history->pembayaran->created_at->diffForHumans()}}</p>
						</td>
						<td>
							@if ($history->status_pembayaran == "verifikasi")
							<h4>Sedang di Proses</h4>
							@elseif($history->status_pembayaran == "pengiriman")
							<h4>Proses Pengiriman</h4>
							@else
							<h4>Produk Telah sampai</h4>
							@endif
						</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

</div>

@endsection