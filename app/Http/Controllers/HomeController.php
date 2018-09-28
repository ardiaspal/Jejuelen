<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\petani;
use App\konsumenUmum;
use App\konsumenMitra;

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
            $mitra = konsumenMitra::where('email',Auth::user()->email)->first();
            return view('mitra.index',compact('mitra'));
        } else {
            Auth::logout();
            return view('mitra.mitra-validasi');
        }

    } else if(Auth::user()->status_id == 2){
        $umum = konsumenUmum::where('email',Auth::user()->email)->first();
        return view('umum.index',compact('umum'));
    } else if(Auth::user()->status_id == 3){
     $petani = petani::where('email',Auth::user()->email)->first();
     return view('petani.index',compact('petani'));
 } else{
    abort(404);
}
}

}
public function mitraValidasi()
{
    return view('mitra.mitra-validasi');
}
}
