<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Auth;
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
            'email' => 'required|string|email',
            'password' => 'required|string',
            'type' => 'required|string'
        ]);
        
        $input = $request->all();

        $credencials = [
            'email' => $request->email,
            'type' => $request->type,
            'password' => $request->password,
        ];

        if($request->type !== 'customer'){
            return response()->json(['response' => 'Acesso negado'], 401);
        }

        if(!Auth::attempt($credencials)){
            return response()->json(['response' => 'Acesso negado'], 401);
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
        $user = new User([

            'name' => $request->get('customer_name'),
            'type' => 'customer',
            'email' => $request->get('customer_email'),
            'phone' => $request->get('customer_phone'),
            'cpf' => $request->get('customer_cpf'),
            'cep' => $request->get('customer_cep'),
            'api_token' => Str::random(60),
            'password' => Hash::make($request->get('customer_password')),
        ]);

        $user->save();

        return response()->json(['response' => 'Cadastrado com sucesso!']);
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
}
