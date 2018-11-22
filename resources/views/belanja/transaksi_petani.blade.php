@extends('layouts.app')
@section('title', 'Transaksi Petani')
@section('content')

<div class="grup-pembayaran">
	<h2>#Transaksi Petani</h2>
	
	<div class="grup-all-history">
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Detail</th>
						<th>Pembeli</th>
						<th>Pemabayaran</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($transaksi_kgs as $transaksi)
					<tr>
						<td>{{$no++}}</td>
						<td>
							<div class="grup-image-history">
								<img style="width: 100%; height: 100%;" src="{{ asset('image/projek/'.$transaksi->pesanan->produkKG->image) }}" alt="">
							</div>
							<div class="grup-detail-pesanan">
								<h1><a href="/produk-KG/{{$transaksi->pesanan->produkKG->slug}}">{{$transaksi->pesanan->produkKG->nama}}</a></h1>
								<p>By <a href="#!">{{$transaksi->pesanan->produkKG->petani->name}}</a></p>
							</div>
						</td>
						<td>
							<p style="margin-bottom: 0">Status : Kg</p>
							<p style="margin-bottom: 0">Jumlah : {{$transaksi->jumlah}}</p>
							<p>Harga Total : {{$transaksi->hargaTot}}</p>
						</td>
						<td>
							<div class="grup-image-history">
								<a href="{{ asset('image/atm/'.$transaksi->pembayaran->image) }}" data-lightbox="roadtrip" data-title="{{$transaksi->username}} - {{$transaksi->created_at->format('d-M-Y')}}">
									<img style="width: 100%; height: 100%;" src="{{ asset('image/atm/'.$transaksi->pembayaran->image) }}" alt="">
								</a>
							</div>
							<div class="grup-detail-pesanan">
								<h1><a href="#!">{{$transaksi->username}}</a></h1>
								<p style="margin: 0">{{$transaksi->email}}</p>
								<p>No Rekening : {{$transaksi->norekening}}</p>
							</div>
						</td>
						<td>
							<p style="margin-bottom: 0">{{$transaksi->pembayaran->created_at->format('d-M-Y')}}</p>
							<p>{{ $transaksi->pembayaran->created_at->diffForHumans()}}</p>
						</td>
						<td>
							@if ($transaksi->status_pembayaran == "verifikasi")
							<h4>Telah membayar</h4>
							@elseif($transaksi->status_pembayaran == "pengiriman")
							<h4>Proses Pengiriman</h4>
							@else
							<h4>Produk Telah sampai</h4>
							@endif
						</td>
					</tr>
					@endforeach

					@foreach ($transaksi_lahans as $transaksi)
					<tr>
						<td>{{$no++}}</td>
						<td>
							<div class="grup-image-history">
								<img style="width: 100%; height: 100%;" src="{{ asset('image/projek/'.$transaksi->pesanan->produkLahan->image) }}" alt="">
							</div>
							<div class="grup-detail-pesanan">
								<h1><a href="/produk-Lahan/{{$transaksi->pesanan->produkLahan->slug}}">{{$transaksi->pesanan->produkLahan->nama}}</a></h1>
								<p>By <a href="#!">{{$transaksi->pesanan->produkLahan->petani->name}}</a></p>
							</div>
						</td>
						<td>
							<p style="margin-bottom: 0">Status : Lahan</p>
							<p style="margin-bottom: 0">Pembayaran : {{$transaksi->jumlah}}</p>
						</td>
						<td>
							<div class="grup-image-history">
								<a href="{{ asset('image/atm/'.$transaksi->pembayaran->image) }}" data-lightbox="roadtrip" data-title="{{$transaksi->username}} - {{$transaksi->created_at->format('d-M-Y')}}">
									<img style="width: 100%; height: 100%;" src="{{ asset('image/atm/'.$transaksi->pembayaran->image) }}" alt="">
								</a>
							</div>
							<div class="grup-detail-pesanan">
								<h1><a href="#!">{{$transaksi->username}}</a></h1>
								<p style="margin: 0">{{$transaksi->email}}</p>
								<p>No Rekening : {{$transaksi->norekening}}</p>
							</div>
						</td>
						<td>
							<p style="margin-bottom: 0">{{$transaksi->pembayaran->created_at->format('d-M-Y')}}</p>
							<p>{{ $transaksi->pembayaran->created_at->diffForHumans()}}</p>
						</td>
						<td>
							@if ($transaksi->status_pembayaran == "verifikasi")
							<h4>Telah membayar</h4>
							@elseif($transaksi->status_pembayaran == "pengiriman")
							<h4>Proses Pengiriman</h4>
							@else
							<h4>Produk Telah sampai</h4>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

</div>


@endsection