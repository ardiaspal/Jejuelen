<?php

namespace App\Http\Controllers;

use App\konsumenMitra;
use App\User;
use Illuminate\Http\Request;
use Auth;
class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     if (Auth::user()->status_id == 1) {
       $mitra = konsumenMitra::where('email',Auth::user()->email)->first();
       return view('mitra.index',compact('mitra'));
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


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mitra = konsumenMitra::findOrFail($id);
        return view('mitra.profile', compact('mitra'));
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
        $mitra = konsumenMitra::findOrFail($id);
        $user = User::findOrFail(Auth::user()->id);
        if ($request->email == Auth::user()->email) {
           // validari
            $this->validate($request,[
                'email' => 'required|string',
                'namaCv' => 'required',
                'nohp' => 'required',
                'alamat' => 'required',
                'image' => 'required',
            ]);
        } else {
            // validari
            $this->validate($request,[
                'email' => 'required|string|email|max:255|unique:users',
                'email' => 'required|string',
                'namaCv' => 'required',
                'nohp' => 'required',
                'alamat' => 'required',
                'image' => 'required',
            ]);

        }
        

        if ($mitra->isOuner()) {
            $user->update([
                'email'     => $request->email,
            ]);

            $mitra->update([
                'namaCv'     => $request->namaCv,
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
