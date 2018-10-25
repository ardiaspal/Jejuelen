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
	public function produk_jual()
	{
		$produkKG = produkKG::with('hargaFix','petani')->orderBy('created_at','des')->paginate(20);
		$produkLahan = produkLahan::with('petani')->orderBy('created_at','des')->paginate(20);
		if (Auth::check()) {
			$petani = petani::where('email',Auth::user()->email)->first();
		}

		return view('belanja.produk', compact('produkKG','produkLahan','petani'));
	}
}
