<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\petani;
use App\konsumenUmum;
use App\konsumenMitra;
use App\produkKG;
use App\produkLahan;
use App\pesanan;

use Illuminate\Http\Request;

class PesananController extends Controller
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

    }

    public function pesananKg(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->status_id == 1 || Auth::user()->status_id == 2) {
             if ( !empty(pesanan::where('user_id',Auth::user()->id)->first()) && !empty(pesanan::where('produkKg_id',$request->produkKg_id)->first()) ) {
              // update
                $this->validate($request,[
                    'jumlah' => 'required',
                ]);


                $produkKG = produkKG::findOrFail($request->produkKg_id);
                if ($request->jumlah<=0 || $request->jumlah > $produkKG->stok) {
                    return redirect('/produk');
                }else{

                    $produkKG->update([
                        'stok'     => $produkKG->stok - $request->jumlah,
                    ]);
                }
                $pesanan =   pesanan::where('user_id',Auth::user()->id)->where('produkKg_id',$request->produkKg_id)->first();

                $pesanan->update([
                    'jumlah' => $pesanan->jumlah + $request->jumlah,
                    'hargaTot' => $pesanan->hargaTot + ($request->harga * $request->jumlah)
                ]);


                return redirect('/produk');



            }else{

             $this->validate($request,[
                'jumlah' => 'required',
            ]);


             $produkKG = produkKG::findOrFail($request->produkKg_id);
             if ($request->jumlah<=0 || $request->jumlah > $produkKG->stok) {
                return redirect('/produk');
            }else{
                    // dd($produkKG->stok - $request->jumlah);
                $produkKG->update([
                    'stok'     => $produkKG->stok - $request->jumlah,
                ]);
            }
            pesanan::create([
                'jumlah' => $request->jumlah,
                'user_id' => Auth::user()->id,
                'produkKg_id' => $request->produkKg_id,
                'hargaTot' => $request->harga * $request->jumlah,
            ]);

            return redirect('/produk');

        }
    }else{
        abort(404);
    }
}else{
    abort(404);
}

}


public function pesananLahan(Request $request)
{

 if (Auth::check()) {
  if (Auth::user()->status_id == 1) {
    if (!empty(pesanan::where('produkLahan_id',$request->produkLahan_id)->first())) {
     return redirect('/produk');
 } else {
     $this->validate($request,[
        'jumlah' => 'required',
    ]);
     if ($request->jumlah<=0 || $request->jumlah > $request->harga) {
         return redirect('/produk');
     }else{
        // $produkLahan = produkLahan::findOrFail($request->produkLahan_id);
      if ($request->jumlah == $request->harga) {
         pesanan::create([
            'jumlah' => $request->jumlah,
            'user_id' => Auth::user()->id,
            'produkLahan_id' => $request->produkLahan_id,
            'hargaTot' => $request->harga,
        ]);

         return redirect('/produk');
     }else{
         return redirect('/produk');
     }
 }
}

}else{
    abort(404);
}
}else{
    abort(404);
}
}
    /**
     * Display the specified resource.
     *
     * @param  \App\pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show(pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pesanan $pesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pesanan $pesanan)
    {
        //
    }
}
