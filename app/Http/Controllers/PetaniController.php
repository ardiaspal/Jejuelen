<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\petani;
use App\User;
use App\hargaFix;
use App\produkKG;
use Auth;

class PetaniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     if (Auth::user()->status_id == 3) {
        $hargas = hargaFix::all();
        // dd($hargas);
        $petani = petani::where('email',Auth::user()->email)->first();
        $produks = produkKG::with('hargaFix','petani')->where('farmers_id',$petani->id)->orderBy('created_at','des')->paginate(20);
        // dd($produks);

        return view('petani.index',compact('petani','hargas','produks'));
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

    public function tambahProdukKg(Request $request)
    {
        $slug = str_slug($request->nama, '-');
        $petani = petani::where('email',Auth::user()->email)->first();

        // chek apa lug ada yang sama
        if (produkKG::where('slug',$slug)->first() != null) {
            $slug = $slug. '-' . time();
        }


        $hargaFIx_id = hargaFix::where('nama',$request->nama) ->orWhere('hargaBuah',$request->harga)->first();
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

            // dd('wes masuk');

            produkKG::create([
                'nama'           => $request->nama,
                'stok'           => $request->stok,
                'image'          => $request->image,
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
