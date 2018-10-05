<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\konsumenUmum;
use App\konsumenMitra;
use App\petani;
use App\hargaFix;
class MiminController extends Controller
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
    public function daftarPetani()
    {
        $i = 1;
        $petanis = petani::with('user')->get();
        return view('mimin.daftar_petani', compact('petanis','i'));
    }
    public function registerPetani(Request $request)
    {
        $username = str_slug($request->username, '_');

        if (Auth::user()->level == 0) {
           $this->validate($request,[
              'username' => 'required|string|max:255|unique:users',
              'email' => 'required|string|email|max:255|unique:users',
              'password' => 'required|string|min:6|confirmed',
              'ttl' => 'required|date_format:d-m-Y',
              'status_hidup' => 'required',
              'jenisKelamin' => 'required',
          ]);


           $user = User::create([
            'username'  => $username,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'level'     => 1,
            'status_id'     => 3,
            'status'     => 'setuju'
        ]);

           petani::create([
            'name'     => $request->name,
            'nohp'     => $request->nohp,
            'email'     => $request->email,
            'alamat'     => $request->alamat,
            'nik'     => $request->nik,
            'status'     => $request->status_hidup,
            'jenisKelamin'     => $request->jenisKelamin,
            'agama'     => $request->agama,
            'kewarganegaraan'     => $request->kewarganegaraan,
            'ttl'     => $request->ttl,
            'image'     => "https://www.gravatar.com/avatar/". md5( strtolower( trim(  $request->email ) ) ) ."?d=monsterid",
            // 'image'     => "https://img00.deviantart.net/abf8/i/2017/028/d/3/souma_yukihira__shokugeki_no_souma__vector_by_greenmapple17-d9titiu.png",
            'fotoKtp'     => $request->fotoKtp,
            'user_id'     => $user->id
        ]);

           return redirect('/daftar-petani');
       } else {
           abort(404);
       }


   }
   public function daftarPembeli()
   {
    $i = 1;
    $umums = konsumenUmum::with('user')->get();
    return view('mimin.daftar_pembeli', compact('umums','i'));
}   
public function daftarMitra()
{
    $i = 1;
    $mitras = konsumenMitra::with('user')->get();
    return view('mimin.daftar_mitra',compact('mitras','i'));
}
public function dasboard()
{
   if (Auth::user()->level == 0) {
       return view('mimin.index');
   } else {
       abort(404);
   }
}
public function managemenPasar()
{
   if (Auth::user()->level == 0) {
    $i = 1;
    $hargas = hargaFix::all();
    return view('mimin.managemen_pasar', compact('hargas','i'));
} else {
   abort(404);
}
}

public function tambahHargaBuah(Request $request)
{
    // dd('masuk');
   if (Auth::user()->level == 0) {
     $this->validate($request,[
        'nama' => 'required',
        'harga' => 'required|integer'
    ]);


     hargaFix::create([
        'nama'     => $request->nama,
        'hargaBuah'     => $request->harga,
    ]);

     return redirect('/managemen-pasar');


 } else {
     abort(404);
 }

}

public function editHargaBuah(Request $request, $id)
{
 $harga = hargaFix::findOrFail($id);

 if (Auth::user()->level == 0) {
     $this->validate($request,[
        'nama' => 'required',
        'harga' => 'required|integer'
    ]);


     $harga->update([
        'nama'     => $request->nama,
        'hargaBuah'     => $request->harga,
    ]);

     return redirect('/managemen-pasar');


 } else {
     abort(404);
 }

}

public function hapusharga($id)
{
    $harga = hargaFix::findOrFail($id);

    if (Auth::user()->level == 0) {
       $harga->delete();
   }else {
       abort(404);
   }
   return redirect('/managemen-pasar');
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
