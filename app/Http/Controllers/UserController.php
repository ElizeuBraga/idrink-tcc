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
    // ---------------------------------------------------------------------------------------------
    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'type' => 'required|string'
        ]);

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

    // ---------------------------------------------------------------------------------------------
    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json(['response' => 'Deslogado com sucesso']);
    }

    public function index()
    {
        return response()->json(["response" => "Olá index"]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input = Input::all();
        $input['password'] = Hash::make($input['password']);
        $input['api_token'] = Str::random(60);
        $user = new User();
        $user->fill($input);
        $user->save();
        return $user;
    }

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
