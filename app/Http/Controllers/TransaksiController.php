<?php

namespace App\Http\Controllers;

use Auth;
use App\transaksi;
use App\pesanan;
use App\pembayaran;

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
