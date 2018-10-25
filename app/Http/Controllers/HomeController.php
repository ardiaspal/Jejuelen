<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\petani;
use App\konsumenUmum;
use App\konsumenMitra;
use App\produkKG;
use App\produkLahan;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('home');
       if (Auth::check()) {
        if (Auth::user()->level == 0) {
         return redirect('/mimin');
     } else if (Auth::user()->status_id == 1) {
        if (Auth::user()->status == 'setuju') {
           return redirect('/mitra');
       } else {
        Auth::logout();
        return view('mitra.mitra-validasi');
    }

} else if(Auth::user()->status_id == 2){
   return redirect('/umum');
} else if(Auth::user()->status_id == 3){
   if (Auth::user()->status == 'setuju') {
       return redirect('/petani');
   }else{
    return redirect('/petani-validasi');
}
} else{
    abort(404);
}
}

}
public function mitraValidasi()
{
    Auth::logout();
    return view('mitra.mitra-validasi');
}
public function petaniValidasi()
{
    $id_user = Auth::user()->id;
    Auth::logout();
    // dd($id_user);
    return view('petani.verifikasi_petani',compact('id_user'));
}


}
