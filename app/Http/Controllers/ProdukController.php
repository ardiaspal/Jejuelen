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

class ProdukController extends Controller
{
	public function produk_jual(Request $request)
	{
		$search = urldecode($request->input('search'));
		// dd($request->typeProduk);

		if (!empty($search)) {
			if ($request->typeProduk == 'kg') {
				$produkKG = produkKG::with('hargaFix','petani')->where('nama', 'like', '%'.$search.'%')->orderBy('created_at','asc')->paginate(20);
				$produkLahan = produkLahan::with('petani')->orderBy('created_at','asc')->paginate(20);
			} else {
				$produkLahan = produkLahan::with('petani')->where('nama', 'like', '%'.$search.'%')->orderBy('created_at','asc')->paginate(20);
				$produkKG = produkKG::with('hargaFix','petani')->orderBy('created_at','asc')->paginate(20);
			}

		}else {
			$produkKG = produkKG::with('hargaFix','petani')->orderBy('created_at','asc')->paginate(20);
			$produkLahan = produkLahan::with('petani')->orderBy('created_at','asc')->paginate(20);
		}

		if (Auth::check()) {
			$petani = petani::where('email',Auth::user()->email)->first();
		}

		return view('belanja.produk', compact('produkKG','produkLahan','petani'));
	}
}
