@extends('layouts.app')
@section('title','Pembayaran ')
@section('content')

<div class="grup-pembayaran">
	<h2>#Pembayaran</h2>
	
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
					@foreach ($transaksis as $transaksi)
					@if ($transaksi->produkLahan_id == null)
					<tr>
						<td>{{$no++}}</td>
						<td>
							<div class="grup-image-history">
								<img style="width: 100%; height: 100%;" src="{{ asset('image/projek/'.$transaksi->pesanan->produkKG->image) }}" alt="">
							</div>
							<div class="grup-detail-pesanan">
								<h1><a href="/produk-KG/{{$transaksi->pesanan->produkKG->slug}}">{{$transaksi->pesanan->produkKG->nama}}</a></h1>
								<p>By <a href="/petani-profile/{{$transaksi->pesanan->produkKG->petani->user->username}}">{{$transaksi->pesanan->produkKG->petani->name}}</a></p>
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
							<form action="/pembayaran/verifikasi/{{$transaksi->pembayaran->id}}" method="POST">
								<select id="changeData{{$transaksi->pembayaran->id}}" select-group='changeData{{$transaksi->pembayaran->id}}' data-id="{{$transaksi->pembayaran->id}}" class="mapped" name="verifikasi">
									<option {{strcasecmp($transaksi->pembayaran->status_pembayaran, 'verifikasi') == 0  ? 'selected' : ''}}>verifikasi</option>
									<option {{strcasecmp($transaksi->pembayaran->status_pembayaran, 'pengiriman') == 0  ? 'selected' : ''}}>pengiriman</option>
									<option {{strcasecmp($transaksi->pembayaran->status_pembayaran, 'sampai') == 0  ? 'selected' : ''}}>sampai</option>
									{{ csrf_field() }}
									<input type="hidden" name="_method"  value="PUT">
								</select>
							</form>
						</td>
					</tr>
					@else
					<tr>
						<td>{{$no++}}</td>
						<td>
							<div class="grup-image-history">
								<img style="width: 100%; height: 100%;" src="{{ asset('image/projek/'.$transaksi->pesanan->produkLahan->image) }}" alt="">
							</div>
							<div class="grup-detail-pesanan">
								<h1><a href="/produk-Lahan/{{$transaksi->pesanan->produkLahan->slug}}">{{$transaksi->pesanan->produkLahan->nama}}</a></h1>
								<p>By <a href="/petani-profile/{{$transaksi->pesanan->produkLahan->petani->user->username}}">{{$transaksi->pesanan->produkLahan->petani->name}}</a></p>
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
							<form action="/pembayaran/verifikasi/{{$transaksi->pembayaran->id}}" method="POST">
								<select id="changeData{{$transaksi->pembayaran->id}}" select-group='changeData{{$transaksi->pembayaran->id}}' data-id="{{$transaksi->pembayaran->id}}" class="mapped" name="verifikasi">
									<option {{strcasecmp($transaksi->pembayaran->status_pembayaran, 'verifikasi') == 0  ? 'selected' : ''}}>verifikasi</option>
									<option {{strcasecmp($transaksi->pembayaran->status_pembayaran, 'pengiriman') == 0  ? 'selected' : ''}}>pengiriman</option>
									<option {{strcasecmp($transaksi->pembayaran->status_pembayaran, 'sampai') == 0  ? 'selected' : ''}}>sampai</option>
									{{ csrf_field() }}
									<input type="hidden" name="_method"  value="PUT">
								</select> 
							</form>
						</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

</div>

@section('script')
<script type="text/javascript">
	
	$(".mapped").change(function(){
		var _value=$(this).val();
		var select_group=$(this).attr("select-group");
		var id_pembayaran = $(this).data("id");
		$('select[select-group="'+select_group+'"]').not(this).val(_value);

		console.log();
		var urldata = "{{url('/pembayaran/verifikasi')}}"+'/'+id_pembayaran;

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			type: "POST",
			dataType: 'json',
			url: urldata,
			data:{ '_token': $('input[name=_token]').val(), 'id_pembayaran': id_pembayaran, 'data': _value },
			success: function( data ) {
				console.log(data);
			},
			erro:function(data) {
				console.log(data);
			}{

			}
		}).done(function(data){
			console.log('suksess');
			toastr.success('Update Data Pembayaran Berhasil.', 'Data Pembayaran', {timeOut: 5000});
		});

	});
</script>
@endsection

@endsection