<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\konsumenUmum;
use Auth;
use App\produkKG;
use App\produkLahan;
use App\pesanan;
use App\transaksi;

class UmumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if (Auth::user()->status_id == 2) {
           $umum = konsumenUmum::where('email',Auth::user()->email)->first();


        // pesanan/transaksi
           $pesananKgs = pesanan::where('produkLahan_id',null)->where('user_id',Auth::user()->id)->where('status','tidak')->get();
           $pesananLahans = pesanan::where('produkKg_id',null)->where('user_id',Auth::user()->id)->where('status','tidak')->get();
           $jumlahTransaksi = count($pesananKgs) + count($pesananLahans);

        // history
           $historys = transaksi::join('pembayaran', 'transaksi.id_pembayaran', '=', 'pembayaran.id')->join('pesanan', 'transaksi.id_pesanan', '=', 'pesanan.id')->where('pesanan.status','terbayar')->where('pesanan.user_id', Auth::user()->id)->get();
           $jumlahHistory = count($historys);

           return view('umum.index',compact('umum','jumlahTransaksi','jumlahHistory'));
       } else {
           abort(404);
       }

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
        //
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
        $umum = konsumenUmum::findOrFail($id);
        
        return view('umum.profile', compact('umum'));
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
        $umum = konsumenUmum::findOrFail($id);
        $user = User::findOrFail(Auth::user()->id);
        if ($request->email == Auth::user()->email) {
           // validari
            $this->validate($request,[
                'email' => 'required|string',
                'name' => 'required',
                'nohp' => 'required',
                'alamat' => 'required',
                'image' => 'required',
            ]);
        } else {
            // validari
            $this->validate($request,[
                'email' => 'required|string|email|max:255|unique:users',
                'email' => 'required|string',
                'name' => 'required',
                'nohp' => 'required',
                'alamat' => 'required',
                'image' => 'required',
            ]);

        }
        
        if ($umum->isOuner()) {
            $user->update([
                'email'     => $request->email,
            ]);

            $umum->update([
                'name'     => $request->name,
                'nohp'     => $request->nohp,
                'email'     => $request->email,
                'alamat'     => $request->alamat,
                'image'     => $request->image,
            ]);
        }else {
         abort(403);
     }
     return redirect('/home');
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
