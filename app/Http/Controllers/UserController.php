<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Auth;
use Illuminate\Support\Facades\Auth;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return response()->json(['name' => Auth::user()->name]);
        return response()->json(["response" => "Olá index"]);
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
        $users = DB::table('users')->get();
        return response()->json($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
