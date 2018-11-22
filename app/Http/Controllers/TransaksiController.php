<?php

namespace App\Http\Controllers;

use Auth;
use App\transaksi;
use App\pesanan;
use App\pembayaran;
use Response;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksiGan = transaksi::with('pesanan')->join('pesanan', 'transaksi.id_pesanan', '=', 'pesanan.id')->where('user_id',Auth::user()->id)->where('status','terbayar')->where('id_pembayaran', null)->first();
        
        // dd($transaksiGan->totalPembayaran);
        $id_pesanan = explode(",",$request->id_pesanan);
        // dd($_pesanan[0]);
        // dd($id_pesanan[0]);
        if (empty($transaksiGan->totalPembayaran)) {
            for ($i=0; $i < count($id_pesanan) ; $i++) { 
                transaksi::create([
                    'id_pesanan' => $id_pesanan[$i],
                    'totalPembayaran' => $request->jumlahTotal,
                ]);

                $udaptePesanan = pesanan::findOrFail($id_pesanan[$i]);

                $udaptePesanan->update([
                    'status' => 'terbayar'
                ]);
            }
        }else{
            for ($i=0; $i < count($id_pesanan) ; $i++) { 
                transaksi::create([
                    'id_pesanan' => $id_pesanan[$i],
                    'totalPembayaran' => $request->jumlahTotal + $transaksiGan->totalPembayaran,
                ]);

                $transaksis = transaksi::with('pesanan')->join('pesanan', 'transaksi.id_pesanan', '=', 'pesanan.id')->where('user_id',Auth::user()->id)->where('status','terbayar')->where('id_pembayaran', null)->get();

                if (count($transaksis)>0) {
                    foreach ($transaksis as $transaksi) {

                     $transaksiUpdate = transaksi::where('id_pesanan',$transaksi->id)->first();

                     $transaksiUpdate->update([
                        'totalPembayaran' => $request->jumlahTotal + $transaksiGan->totalPembayaran,
                    ]);
                 }
             }

             $udaptePesanan = pesanan::findOrFail($id_pesanan[$i]);

             $udaptePesanan->update([
                'status' => 'terbayar'
            ]);
         }
     }


     return redirect('/pembayaran');
 }

 public function pembayaran()
 {
    $transaksi = transaksi::with('pesanan')->join('pesanan', 'transaksi.id_pesanan', '=', 'pesanan.id')->where('user_id',Auth::user()->id)->where('status','terbayar')->where('id_pembayaran', null)->first();
    return view('belanja.transaksi', compact('transaksi'));
}

public function transaksiPetani()
{
 // $transaksis = transaksi::join('pembayaran', 'transaksi.id_pembayaran', '=', 'pembayaran.id')->join('pesanan', 'transaksi.id_pesanan', '=', 'pesanan.id')->join('produk_kg', 'pesanan.produkKg_id', '=', 'produk_kg.id')->join('produk_lahan', 'pesanan.produkLahan_id', '=', 'produk_lahan.id')->join('farmers','produk_kg.farmers_id', '=', 'farmers.id')->join('farmers','produk_lahan.farmers_id', '=', 'farmers.id')->where('farmers.email', Auth::user()->email)->get();
  $transaksi_lahans = transaksi::with('pesanan','pembayaran')->join('pembayaran', 'transaksi.id_pembayaran', '=', 'pembayaran.id')->join('pesanan', 'transaksi.id_pesanan', '=', 'pesanan.id')->join('produk_lahan', 'pesanan.produkLahan_id', '=', 'produk_lahan.id')->join('farmers', 'produk_lahan.farmers_id', '=', 'farmers.id')->where('farmers.email', Auth::user()->email)->get();
  $transaksi_kgs = transaksi::with('pesanan','pembayaran')->join('pembayaran', 'transaksi.id_pembayaran', '=', 'pembayaran.id')->join('pesanan', 'transaksi.id_pesanan', '=', 'pesanan.id')->join('produk_kg', 'pesanan.produkKg_id', '=', 'produk_kg.id')->join('farmers', 'produk_kg.farmers_id', '=', 'farmers.id')->where('farmers.email', Auth::user()->email)->get();
  $no = 1;
  // ->join('farmers', 'produk_kg.farmers_id', '=', 'farmers.id')->join('farmers', 'produk_lahan.farmers_id', '=', 'farmers.id')
 // dd($transaksi_kgs);
  return view('belanja.transaksi_petani', compact('transaksi_lahans','transaksi_kgs','no'));
}

public function pembayaranUpload(Request $request)
{
    $transaksis = transaksi::with('pesanan')->join('pesanan', 'transaksi.id_pesanan', '=', 'pesanan.id')->where('user_id',Auth::user()->id)->where('status','terbayar')->where('id_pembayaran', null)->get();

    $this->validate($request,[
        'norekening' => 'required|max:19',
        'image' => 'required'
    ]);

    $image = $request->file('image');
    $input['namefile'] = time().'-'.$image->getClientOriginalName();
    $tempat = public_path('image/atm');
    $image->move($tempat,$input['namefile']);

    $pembayarantTransaksi = pembayaran::create([
        'norekening' => $request->norekening,
        'image'      => $input['namefile']
    ]);

    // dd($pembayarantTransaksi->id);

    if (count($transaksis)>0) {
        foreach ($transaksis as $transaksi) {

         $transaksiUpdate = transaksi::where('id_pesanan',$transaksi->id)->first();

         $transaksiUpdate->update([
            'id_pembayaran' => $pembayarantTransaksi->id,
        ]);
     }
 }

 return view('belanja.ucapan');

}

public function history()
{
    $no =1;
    
    if (Auth::check()) {
      if (Auth::user()->status_id == 1 || Auth::user()->status_id == 2) {
        $historys = transaksi::join('pembayaran', 'transaksi.id_pembayaran', '=', 'pembayaran.id')->join('pesanan', 'transaksi.id_pesanan', '=', 'pesanan.id')->where('pesanan.status','terbayar')->where('pesanan.user_id', Auth::user()->id)->get();

        return view('belanja.history_pembeli', compact('historys','no'));
    }else{
        abort(404);
    }
}else{
 abort(404);
}
}

public function pembayaranAdmin()
{
    $transaksis = transaksi::join('pembayaran', 'transaksi.id_pembayaran', '=', 'pembayaran.id')->join('pesanan', 'transaksi.id_pesanan', '=', 'pesanan.id')->join('users','pesanan.user_id','=','users.id')->where('pesanan.status','terbayar')->where('transaksi.id_pembayaran','!=','null')->get();
    $no = 1;
    // dd($transaksi);
    return view('mimin.pembayaran', compact('transaksis','no'));
}

public function updatePembayaran(Request $request, $id)
{
    $pembayaran = pembayaran::findOrFail($id);
    $data = $pembayaran->update([
        'status_pembayaran' => $request->data
    ]);
    // return Response::json($data);
    return response()->json($data);
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
