@extends('layouts.app')
@section('title', 'Verifikasi Petani')
@section('content')

<div class="grup-all-verif-petani">
	<div class="header-nav-verif-petani">
		<h1>Syarat Ketentua Petani</h1>
	</div>

	<div class="content-syarat-petani">
		<form action="/update-petani-validasi/{{$id_user}}" method="post">
			<div class="kontrak-petani">
				<h1>Kontrak Petani</h1>
				<ol>
					<li>Keuntungan yang diambil dari jejuelen.com sebesar Rp. 2000,- dari harga yang tertera di website dan sisanya akan kami bayarkan kepetani<br>
						Ex : harga mangga harumanis di website harga 1 kg Rp. 28.850
						harga yang dibayarkan ke petani sebesar Rp. 26.850
					</li>
					<li>Petani harus mengemas setidaknya sehari sebelum pesanan dikirimkan.
						Pengemasan menggunakan label jejuelen.com yang di distribusikan ke petani setelah kontrak disetujui dikirimkan melalui email.
					</li>
					<li>Penjemputan pesanan dilakukan pukul 05.00 WIB, jadi pesanan harus sudah dalam keadaan siap.</li>
					<li>Memiliki rekening Bank BNI/BRI/Mandiri untuk pembayaran pesanan.</li>
					<li>Untuk penjualan produk lahan harga ditentukan langsung oleh petani. pemesanan produk oleh konsumen hanya sampai proses pembayaran DP booking dan selanjutnya diserahkan ke petani.</li>
					<li>Jejuelen.com mengambil Rp. 2000,- di pembayaran DP sebagai biaya admin</li>
				</ol>
			</div>
			<div class="button-verif">
				<label class="checkbox-inline">
					<input type="checkbox" id="status-verif" name="status_verif" value="setuju">Setuju
				</label>
				{{ csrf_field() }}
				<input type="hidden" name="_method"  value="PUT">
				<button disabled="disabled" id="sendNewBtn" type="submit">Setuju</button>
			</div>
		</form>
	</div>
</div>

@section('script')
<script type="text/javascript">
	var checker = document.getElementById('status-verif');
	var sendbtn = document.getElementById('sendNewBtn');
 // when unchecked or checked, run the function
 checker.onchange = function(){
 	if(this.checked){
 		sendbtn.disabled = false;
 	} else {
 		sendbtn.disabled = true;
 	}
 }
</script>
@endsection

@endsection