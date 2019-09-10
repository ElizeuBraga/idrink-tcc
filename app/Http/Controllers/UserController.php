<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

use DB;

class UserController extends Controller
{
    /**
     * Methods for api
     * 
     * 
     * Sing in the user to the sistem
     */
    public function login(Request $request){
        $request->validate([
            'customer_email' => 'required|string|email',
            'customer_password' => 'required|string',
            // 'customer_type' => 'required|string'
        ]);
            
        // $input = $request->all();

        $credencials = [
            'email' => $request->customer_email,
            'type' => 'customer',
            'password' => $request->customer_password,
        ];

        if($credencials['type'] !== 'customer'){
            return response()->json(['response' => 'Tipo de usuario não permitido'], 401);
        }

        if(!Auth::attempt($credencials)){
            return response()->json(['response' => 'Acesso negado!'], 401);
        }

        $user = $request->user();
        $token = $user->createToken('Token de acesso')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    /**
     * Logout a user to the sistem
     */
    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json(['response' => 'Deslogado com sucesso']);
    }

    /**
     * 
     */
    public function index()
    {
        return response()->json(["Usuario logado" => Auth::user()->id]);
    }

    public function create()
    {
        //
    }

    /**
     * Stores a new user in the sistem
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users|email'
        ];

        $messages = [
            'email.email' => 'Email inválido',
            'email.required' => 'Preencha o campo email',
            'unique' => 'Esse email já existe'
        ];
        
        $validator = Validator::make($data, $rules, $messages);
        // dd($validator->errors());

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        $user = new User([
            'name' => $request->get('name'),
            'type' => 'customer',
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'cpf' => $request->get('cpf'),
            'cep' => $request->get('cep'),
            'api_token' => Str::random(60),
            'password' => Hash::make($request->get('customer_password')),
        ]);


        $user->save();
        
        $token = $user->createToken('Token de acesso')->accessToken;
        return response()->json(['token' => $token], 200);
    }

    /**
     * Find a user in the sistem
     */
    public function show($id)
    {
        $users = DB::table('users')->get();
        return response()->json($users);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function allStores(){
        $stores = User::where('type', 'store')->get();

        return response()->json($stores, 200);
    }
}
