@extends('layouts.app')
@section('title', 'Pesanan')
@section('content')

<div class="grup-pesanan-lanjutan">
	<div class="col-sm-12 col-md-8" id="jarak-bawah-pesanan">
		<div class="grup-one-transaksi table-responsive">
			<table style="width: 100%">
				<tr>
					<th>
						<label class="container-mod">
							<input type="checkbox" name="chek-pesanan" id="select-all" value="0">
							<span class="checkmark"></span>
						</label>
					</th>
					<th>Semua Barang ({{count($pesananKgs) + count($pesananLahans)}})</th>
					<th>Harga</th>
					<th>Keterngan(Kg/Lahan)</th>
				</tr>
				@foreach ($pesananKgs as $pesanan)
				<tr>
					<td>
						<label class="container-mod">
							<input type="checkbox" name="chek-pesanan" data-id="{{$pesanan->id}}" value="{{$pesanan->hargaTot}}">
							<span class="checkmark"></span>
						</label>
					</td>
					<td>
						<div class="grup-detail-pesanan-new">
							<div class="col-xs-3">
								<div class="image-pesanan-pesan">
									<img src="{{ asset('image/projek/'.$pesanan->produkKG->image) }}" alt="">
								</div>
							</div>
							<div class="col-xs-9">
								<div class="grup-detail-pesanan-pesan">
									<a href="/produk-KG/{{$pesanan->produkKG->slug}}"><h5>{{$pesanan->produkKG->nama}}</h5></a>
									<p>Publish by : <a href="/petani-profile/{{$pesanan->produkKG->petani->user->username}}">{{$pesanan->produkKG->petani->name}}</a></p>
									<a href="/pesanan/hapus/{{$pesanan->id}}/kg/{{$pesanan->produkKg_id}}" onclick="return confirm('Anda yakin ingin menghapus Pesanan ?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
					</td>
					<td>
						<p>Rp. {{$pesanan->produkKG->hargaFix->hargaBuah}},-</p>
					</td>
					<td>
						<p>{{$pesanan->jumlah}}</p>
					</td>
				</tr>
				@endforeach
				@foreach ($pesananLahans as $pesanan)
				<tr>
					<td>
						<label class="container-mod">
							<input type="checkbox" name="chek-pesanan" data-id="{{$pesanan->id}}" value="{{$pesanan->hargaTot}}">
							<span class="checkmark"></span>
						</label>
					</td>
					<td>
						<div class="grup-detail-pesanan-new">
							<div class="col-xs-3">
								<div class="image-pesanan-pesan">
									<img src="{{ asset('image/projek/'.$pesanan->produkLahan->image) }}" alt="">
								</div>
							</div>
							<div class="col-xs-9">
								<div class="grup-detail-pesanan-pesan">
									<a href="/produk-Lahan/{{$pesanan->produkLahan->slug}}"><h5>{{$pesanan->produkLahan->nama}}</h5></a>
									<p>Publish by : <a href="/petani-profile/{{$pesanan->produkLahan->petani->user->username}}">{{$pesanan->produkLahan->petani->name}}</a></p>
									<a href="/pesanan/hapus/{{$pesanan->id}}/lahan/{{$pesanan->produkLahan_id}}" onclick="return confirm('Anda yakin ingin menghapus Pesanan ?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
					</td>
					<td>
						<p>Rp. {{$pesanan->hargaTot}},-</p>
					</td>
					<td>
						<p>Lahan</p>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
	<div class="col-sm-12 col-md-4">
		<div class="total-detail-pesanan">
			<h3>Ringkasan Pesanan</h3>
			<form action="/transaksi" method="POST">
				<table style="width: 100%">
					<tr>
						<td>
							<p>Subtotal</p>
						</td>
						<td style="position: relative;overflow: hidden;">
							<input type="text" style="color: #636b6f;margin-left: 0;" readonly="readonly" id="price2" value="0" name="jumlahTotal">
						</td>
					</tr>
					<tr>
						<td>
							<p>Biaya Pengiriman</p>
						</td>
						<td>
							<p style="color: #ff9800"><b>Gratis</b></p>
						</td>
					</tr>
					<tr>
						<td>
							<p>Total</p>
						</td>
						<td style="position: relative;overflow: hidden;">
							<p style="color: #ff9800; display: inline-block;" ><b>Rp</b></p>
							<input type="text" readonly="readonly" id="price" value="0" name="jumlahTotal">
						</td>
					</tr>
				</table>

				<input type="hidden" readonly="readonly" id="id_pesanan" value="" name="id_pesanan">
				{{ csrf_field() }}
				@if ( (count($pesananKgs) + count($pesananLahans)) > 0 )
					<button type="submit">Bayar Pesanan</button>
				@endif

			</form>
		</div>
	</div>
</div>

@section('script')
<script type="text/javascript">

	$('#select-all').click(function(event) {   
		if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
        	this.checked = true; 
        });
    } else {
    	$(':checkbox').each(function() {
    		this.checked = false;                       
    	});
    }
});

	$('input[type="checkbox"]').change(function(){
		var totalprice = 0; //15000
		var totalprice2 = 0;
		var id_pesanan = [];
		$('input[type="checkbox"]:checked').each(function(){
			totalprice= totalprice + parseInt($(this).val());
			totalprice2= totalprice2 + parseInt($(this).val());
			id_pesanan.push($(this).attr("data-id"));
			// console.log($(this).attr("data-id"));
			// console.log(id_pesanan.join(','));
		});
		$('#price').val(totalprice);
		$('#price2').val(totalprice2);

		if (id_pesanan[0] == null) {
			id_pesanan.shift();
		} 
		$('#id_pesanan').val(id_pesanan.join(','));
		// console.log(id_pesanan[0] == null);
	});
</script>
@endsection

@endsection