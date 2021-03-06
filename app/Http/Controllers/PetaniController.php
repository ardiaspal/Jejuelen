<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\petani;
use App\User;
use App\hargaFix;
use App\produkKG;
use App\produkLahan;
use Illuminate\Support\Facades\Storage;
use Auth;

class PetaniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function awalHome()
    {
        $produkKG = produkKG::with('hargaFix','petani')->orderBy('created_at','asc')->paginate(12);
        return view('welcome2',compact('produkKG'));
    }

    
    public function index()
    {
     if (Auth::user()->status_id == 3) {
        $hargas = hargaFix::all();
        // dd($hargas);
        $petani = petani::where('email',Auth::user()->email)->first();
        $produks = produkKG::with('hargaFix','petani')->where('farmers_id',$petani->id)->orderBy('created_at','des')->paginate(20);
        $produklahans = produkLahan::with('petani')->where('farmers_id',$petani->id)->orderBy('created_at','des')->paginate(20);
        // dd($produks);

        return view('petani.index',compact('petani','hargas','produks','produklahans'));
    } else {
     abort(404);
 }

}

public function profilePetani($username=null)
{
    // dd('masuk');
   try {
     if ($username == null) {
      abort(403);
  }else {
      $user  = User::where('username',$username)->first();
      if ($user == null) {
        abort(403);
    }else{
       $hargas = hargaFix::all();
        // dd($hargas);
       $petani = petani::where('email',$user->email)->first();
       $produks = produkKG::with('hargaFix','petani')->where('farmers_id',$petani->id)->orderBy('created_at','des')->paginate(20);
       $produklahans = produkLahan::with('petani')->where('farmers_id',$petani->id)->orderBy('created_at','des')->paginate(20);
   }
}
} catch (Exception $e) {
   abort(403);
}
return view('petani.single_profile',compact('petani','hargas','produks','produklahans'));
}

public function petaniUpdateValidasi(Request $request, $id)
{
    // dd('masuk');
    if (Auth::check()) {
      abort(404);
  }else{
    $user = User::findOrFail($id);
    // dd($user);
    $user->update([
        'status'     => $request->status_verif
    ]);
    return redirect('/home');
}
abort(404);
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

    public function tambahProdukKg(Request $request)
    {
        $slug = str_slug($request->nama, '-');
        $petani = petani::where('email',Auth::user()->email)->first();

        // chek apa lug ada yang sama
        if (produkKG::where('slug',$slug)->first() != null) {
            $slug = $slug. '-' . time();
        }


        $hargaFIx_id = hargaFix::where('nama',$request->nama)->orWhere('hargaBuah',$request->harga)->first();
        // dd($petani->id);
        if (Auth::user()->status_id == 3) {
            // dd($request);
            $this->validate($request,[
                'nama' => 'required',
                'stok' => 'required|integer',
                'image' => 'required',
                'harga' => 'required|integer',
                'deskripsi' => 'required'
            ]);

            $image = $request->file('image');
            $input['namefile'] = time().'-'.$image->getClientOriginalName();
            $tempat = public_path('image/projek');
            $image->move($tempat,$input['namefile']);
            // dd('wes masuk');

            produkKG::create([
                'nama'           => $request->nama,
                'stok'           => $request->stok,
                'image'          =>  $input['namefile'],
                'deskripsi'          => $request->deskripsi,
                'slug'           =>  $slug,
                'farmers_id'     => $petani->id,
                'hargaFix_id'    => $hargaFIx_id->id
            ]);

            return redirect('/petani');
        } else {
           abort(404);
       }
   }

   public function tambahProdukLahan(Request $request)
   {
       $slug = str_slug($request->nama, '-');
       $petani = petani::where('email',Auth::user()->email)->first();

        // chek apa lug ada yang sama
       if (produkLahan::where('slug',$slug)->first() != null) {
        $slug = $slug. '-' . time();
    }

        // dd($petani->id);
    if (Auth::user()->status_id == 3) {
            // dd($request);
        $this->validate($request,[
            'nama' => 'required',
            'stokAwal' => 'required|integer',
            'stokAkhir' => 'required|integer',
            'image' => 'required',
            'harga' => 'required|integer',
            'masatanam' => 'required|date_format:d-m-Y',
            'perkiraanPanen' => 'required|date_format:d-m-Y',
            'deskripsi' => 'required'
        ]);

        $image = $request->file('image');
        $input['namefile'] = time().'-'.$image->getClientOriginalName();
        $tempat = public_path('image/projek');
        $image->move($tempat,$input['namefile']);
        // dd('wes masuk');

        produkLahan::create([
            'nama'           => $request->nama,
            'stokAwal'           => $request->stokAwal,
            'stokAkhir'           => $request->stokAkhir,
            'harga'          => $request->harga+2000,
            'deskripsi'          => $request->deskripsi,
            'masatanam'          => $request->masatanam,
            'perkiraanPanen'          => $request->perkiraanPanen,
            'slug'           =>  $slug,
            'image'           =>  $input['namefile'],
            'farmers_id'     => $petani->id
        ]);

        return redirect('/petani');
    } else {
       abort(404);
   }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    public function showprodukKG($slug)
    {
     $produk = produkKG::where('slug',$slug)->first();
     return view('petani.single_produkKG', compact('produk'));
 }

 public function showprodukLahan($slug)
 {
     $produk = produkLahan::where('slug',$slug)->first();
     return view('petani.single_produkLahan', compact('produk'));
 }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petani = petani::findOrFail($id);
        
        return view('petani.profile', compact('petani'));
    }

    public function editprodukkg($id)
    {
        $hargas = hargaFix::all();
        $produk = produkKG::findOrFail($id);
        return view('petani.editKg', compact('produk', 'hargas'));
    }

    public function editdataprodukkg(Request $request, $id)
    {

        $produkKg= produkKG::findOrFail($id);
        $slug = str_slug($request->nama, '-');
        $petani = petani::where('email',Auth::user()->email)->first();

        // chek apa lug ada yang sama
        if (produkKG::where('slug',$slug)->first() != null) {
            $slug = $slug. '-' . time();
        }


        $hargaFIx_id = hargaFix::where('nama',$request->nama)->orWhere('hargaBuah',$request->harga)->first();
        // dd($petani->id);
        if (Auth::user()->status_id == 3) {
            // dd($request);
            if (empty($request->image)) {
                $this->validate($request,[
                    'nama' => 'required',
                    'stok' => 'required|integer',
                    'harga' => 'required|integer',
                    'deskripsi' => 'required'
                ]);

                $produkKg->update([
                    'nama'           => $request->nama,
                    'stok'           => $request->stok,
                    'deskripsi'          => $request->deskripsi,
                    'slug'           =>  $slug,
                ]);

                return redirect('/petani');
            } else {
             $this->validate($request,[
                'nama' => 'required',
                'stok' => 'required|integer',
                'image' => 'required',
                'harga' => 'required|integer',
                'deskripsi' => 'required'
            ]);

             $image = $request->file('image');
             $input['namefile'] = time().'-'.$image->getClientOriginalName();
             $tempat = public_path('image/projek');
             $image->move($tempat,$input['namefile']);
            // dd('wes masuk');
             $produkKg->update([
                'nama'           => $request->nama,
                'stok'           => $request->stok,
                'image'          =>  $input['namefile'],
                'deskripsi'          => $request->deskripsi,
                'slug'           =>  $slug,
            ]);

             return redirect('/petani');
         }

     } else {
       abort(404);
   }
}

public function destroyKg($id)
{
    $produkKg = produkKG::findOrFail($id);

    if (Auth::user()->status_id == 3) {
       $produkKg->delete();
   }else {
       abort(404);
   }
   return redirect('/petani');
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
        $petani = petani::findOrFail($id);
        $user = User::findOrFail(Auth::user()->id);
        if ($request->email == Auth::user()->email) {
           // validari
            $this->validate($request,[
                'email' => 'required|string',
                'ttl' => 'required|date_format:d-m-Y',
                'status_hidup' => 'required',
                'jenisKelamin' => 'required',
            ]);
        } else {
            // validari
            $this->validate($request,[
                'email' => 'required|string|email|max:255|unique:users',
                'ttl' => 'required|date_format:d-m-Y',
                'status_hidup' => 'required',
                'jenisKelamin' => 'required',
            ]);

        }
        

        if ($petani->isOuner()) {
            $user->update([
                'email'     => $request->email,
            ]);

            $petani->update([
                'name'     => $request->name,
                'nohp'     => $request->nohp,
                'email'     => $request->email,
                'alamat'     => $request->alamat,
                'nik'     => $request->nik,
                'status'     => $request->status_hidup,
                'jenisKelamin'     =>$request->jenisKelamin,
                'agama'     => $request->agama,
                'kewarganegaraan'     => $request->kewarganegaraan,
                'ttl'     => $request->ttl,
                'image'     => $request->image,
                'fotoKtp'     => $request->fotoKtp,
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
