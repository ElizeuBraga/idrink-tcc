<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Web\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Image;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    protected $fillable = ['name','email', 'type','phone','cnpj','cep','api_token', 'password'];
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
        $customMessages = [
            'cnpj' => 'CNPJ inválido',
            'celular_com_ddd' => 'Numero inválido'
        ];

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'celular_com_ddd'],
            'cnpj' => ['required', 'cnpj'],
            // 'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], $customMessages);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // // dd(request()->avatar);
        // try {
        //     $imageName = time().'.'.request()->avatar->getClientOriginalExtension();
        //     request()->avatar->move(public_path('avatar'), $imageName);
        //     // dd($imageName);
        // } catch (\Throwable $th) {
        //     throw $th;
        // }

        return User::create([
            'name' => $data['name'],
            'avatar' => 'default.svg',
            'type' => 'store',
            'email' => $data['email'],
            'phone' => $data['phone'],
            'cnpj' => $data['cnpj'],
            'api_token' => $input['api_token'] = Str::random(60),
            'password' => Hash::make($data['password']),
        ]);
    }
}
