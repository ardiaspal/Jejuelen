<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\petani;
use App\konsumenMitra;
use App\konsumenUmum;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if ($data['type'] == 'umum') {
            return Validator::make($data, [
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);
        }else if ($data['type'] == 'petani') {
            // dd('masuk');
         return Validator::make($data, [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'ttl' => 'required|date_format:d-m-Y',
            'status_hidup' => 'required',
            'jenisKelamin' => 'required',
        ]);
     }else if ($data['type'] == 'mitra') {
            // dd('masuk');
         return Validator::make($data, [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
     }
 }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $username = str_slug($data['username'], '_');

        if ($data['type'] == 'umum') {
          $user = User::create([
            'username'  => $username,
            'email'     => $data['email'],
            'password'  => bcrypt($data['password']),
            'level'     => 3,
            'status_id'     => 2,
            'status'     => 'setuju'
        ]);

          konsumenUmum::create([
            'name'     => $data['name'],
            'nohp'     => $data['nohp'],
            'email'     => $data['email'],
            'alamat'     => $data['alamat'],
            'image'     => "https://www.gravatar.com/avatar/". md5( strtolower( trim(  $data['email'] ) ) ) ."?d=monsterid",
            // 'image'     => "https://img00.deviantart.net/abf8/i/2017/028/d/3/souma_yukihira__shokugeki_no_souma__vector_by_greenmapple17-d9titiu.png",
            'user_id'     => $user->id,
        ]);

      }else if ($data['type'] == 'petani') {
        // dd( $data['nik']);
        $user = User::create([
            'username'  => $username,
            'email'     => $data['email'],
            'password'  => bcrypt($data['password']),
            'level'     => 1,
            'status_id'     => 3,
            'status'     => 'tidak'
        ]);

        petani::create([
            'name'     => $data['name'],
            'nohp'     => $data['nohp'],
            'email'     => $data['email'],
            'alamat'     => $data['alamat'],
            'nik'     => $data['nik'],
            'status'     => $data['status_hidup'],
            'jenisKelamin'     => $data['jenisKelamin'],
            'agama'     => $data['agama'],
            'kewarganegaraan'     => $data['kewarganegaraan'],
            'ttl'     => $data['ttl'],
            'image'     => "https://www.gravatar.com/avatar/". md5( strtolower( trim(  $data['email'] ) ) ) ."?d=monsterid",
            // 'image'     => "https://img00.deviantart.net/abf8/i/2017/028/d/3/souma_yukihira__shokugeki_no_souma__vector_by_greenmapple17-d9titiu.png",
            'fotoKtp'     => $data['fotoKtp'],
            'user_id'     => $user->id
        ]);
    }else if ($data['type'] == 'mitra') {
        $user = User::create([
            'username'  => $username,
            'email'     => $data['email'],
            'password'  => bcrypt($data['password']),
            'level'     => 2,
            'status_id'     => 1,
            'status'     => 'tidak'
        ]);

        konsumenMitra::create([
            'namaCv'     => $data['namaCv'],
            'nohp'     => $data['nohp'],
            'email'     => $data['email'],
            'alamat'     => $data['alamat'],
            'image'     => "https://www.gravatar.com/avatar/". md5( strtolower( trim(  $data['email'] ) ) ) ."?d=monsterid",
            // 'image'     => "https://img00.deviantart.net/abf8/i/2017/028/d/3/souma_yukihira__shokugeki_no_souma__vector_by_greenmapple17-d9titiu.png",
            'user_id'     => $user->id
        ]);
    }else{
        abort(404);
    }

}
}
