<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\konsumenUmum;
use App\konsumenMitra;
use App\petani;
use App\hargaFix;
use App\statistik;
use App\transaksi;
use App\pesanan;
use App\pembayaran;
use App\produkKG;
use App\produkLahan;
use Hash;
use validate;
use Illuminate\Contracts\Encryption\DecryptException;

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


   public function editPetani(Request $request, $id)
   {
    // die((strcmp($request->password, $request->password_confirmation)==1) == true);
    $petani = petani::where('id',$id)->first();
    $user = User::where('id',$request->user_id)->first();
    $username = str_slug($request->username, '_');

    if (Auth::user()->level == 0) {

     if (!empty($request->password)) {

       $this->validate($request,[
        'password' => 'required|string|min:6|confirmed',
      ]);
       // dd('tapi masuk');
       if((strcmp($request->password, $request->password_confirmation)==0) == false){
        // dd('tdk cocok');
        return redirect('/pekerja')->with('massage','Ada kesalahan di input anda, silahkan check kembali ');
      }else{
        // dd('masuk sini');
        $user->password = bcrypt($request->password);
        $user->save();
      }

      if ($petani->user_id == $user->id && $petani->email == $request->email) {
        $this->validate($request,[
          'username' => 'required',
          'ttl' => 'required|date_format:d-m-Y',
          'image' => 'required',
          'status_hidup' => 'required',
          'jenisKelamin' => 'required',
          'fotoKtp' => 'required',
        ]);
        $user->update([
          'username'  => $username,
        ]);

        $petani->update([
          'name'     => $request->name,
          'nohp'     => $request->nohp,
          'alamat'     => $request->alamat,
          'nik'     => $request->nik,
          'status'     => $request->status_hidup,
          'jenisKelamin'     => $request->jenisKelamin,
          'agama'     => $request->agama,
          'kewarganegaraan'     => $request->kewarganegaraan,
          'ttl'     => $request->ttl,
          'image'     => $request->image,
          'fotoKtp'     => $request->fotoKtp,
          'user_id'     => $user->id
        ]);

        return redirect('/daftar-petani');

      } else {
       $this->validate($request,[
        'username' => 'required',
        'email' => 'required|string|email|max:255|unique:users',
        'ttl' => 'required|date_format:d-m-Y',
        'image' => 'required',
        'status_hidup' => 'required',
        'jenisKelamin' => 'required',
        'fotoKtp' => 'required',
      ]);
       $user->update([
        'username'  => $username,
        'email'     => $request->email
      ]);

       $petani->update([
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
        'image'     => $request->image,
        'fotoKtp'     => $request->fotoKtp,
        'user_id'     => $user->id
      ]);

       return redirect('/daftar-petani');
     }


   } else {

    if ($petani->user_id == $user->id && $petani->email == $request->email) {
      $this->validate($request,[
        'username' => 'required',
        'ttl' => 'required|date_format:d-m-Y',
        'image' => 'required',
        'status_hidup' => 'required',
        'jenisKelamin' => 'required',
        'fotoKtp' => 'required',
      ]);
      $user->update([
        'username'  => $username,
      ]);

      $petani->update([
        'name'     => $request->name,
        'nohp'     => $request->nohp,
        'alamat'     => $request->alamat,
        'nik'     => $request->nik,
        'status'     => $request->status_hidup,
        'jenisKelamin'     => $request->jenisKelamin,
        'agama'     => $request->agama,
        'kewarganegaraan'     => $request->kewarganegaraan,
        'ttl'     => $request->ttl,
        'image'     => $request->image,
        'fotoKtp'     => $request->fotoKtp,
        'user_id'     => $user->id
      ]);

      return redirect('/daftar-petani');

    } else {
     $this->validate($request,[
      'username' => 'required',
      'email' => 'required|string|email|max:255|unique:users',
      'ttl' => 'required|date_format:d-m-Y',
      'image' => 'required',
      'status_hidup' => 'required',
      'jenisKelamin' => 'required',
      'fotoKtp' => 'required',
    ]);
     $user->update([
      'username'  => $username,
      'email'     => $request->email
    ]);

     $petani->update([
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
      'image'     => $request->image,
      'fotoKtp'     => $request->fotoKtp,
      'user_id'     => $user->id
    ]);

     return redirect('/daftar-petani');
   }

 }

} else {
 abort(404);
}

}

public function hapusPetani($id)
{
  $user = User::where('id',$id)->first();
  if (Auth::user()->level == 0) {
   $user->delete();
 }else {
   abort(404);
 }
 return redirect('/daftar-petani');

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

  $petanis = petani::with('user')->get();
  $umums = konsumenUmum::with('user')->get();
  $mitras = konsumenMitra::with('user')->get();
  $transaksis = transaksi::join('pembayaran', 'transaksi.id_pembayaran', '=', 'pembayaran.id')->join('pesanan', 'transaksi.id_pesanan', '=', 'pesanan.id')->join('users','pesanan.user_id','=','users.id')->where('pesanan.status','terbayar')->where('transaksi.id_pembayaran','!=','null')->get();
  $produkKG = produkKG::with('hargaFix','petani')->orderBy('created_at','des')->get();
  $produkLahan = produkLahan::with('petani')->orderBy('created_at','des')->get();

  return view('mimin.index', compact('petanis','umums','mitras','transaksis','produkKG','produkLahan'));
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


   $id_harga =  hargaFix::create([
    'nama'     => $request->nama,
    'hargaBuah'     => $request->harga,
  ]);     
   statistik::create([
    'nama'     => $request->nama,
    'hargaBuah'     => $request->harga,
    'hargafix_id'     => $id_harga->id
  ]);

   return redirect('/managemen-pasar');


 } else {
   abort(404);
 }

}

public function editHargaBuah(Request $request, $id)
{
 $harga = hargaFix::findOrFail($id);
// dd($haraa);
 if (Auth::user()->level == 0) {
   $this->validate($request,[
    'nama' => 'required',
    'harga' => 'required|integer'
  ]);


   if ($request->harga != $harga->hargaBuah && $request->nama != $harga->nama) {
     if ($request->harga != $harga->hargaBuah) {
      statistik::create([
        'nama'     => $request->nama,
        'hargaBuah'     => $request->harga,
        'hargafix_id'     => $id
      ]);
    }
    if ($request->nama != $harga->nama) {
      $namabuaha = statistik::where('nama',$harga->nama);
      $namabuaha->update([
        'nama'     => $request->nama
      ]);
    }
  }else if ($request->harga != $harga->hargaBuah) {
    statistik::create([
      'nama'     => $request->nama,
      'hargaBuah'     => $request->harga,
      'hargafix_id'     => $id
    ]);
  }else if ($request->nama != $harga->nama) {
    $namabuaha = statistik::where('nama',$harga->nama);
    $namabuaha->update([
      'nama'     => $request->nama
    ]);
  }

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

public function statistikharga($id)
{
  $statistiks = statistik::where('hargafix_id',$id)->orderBy('created_at', 'asc')->get();
  $statistik = statistik::where('hargafix_id',$id)->first();

  return view('mimin.statistik', compact('statistiks','statistik'));
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
