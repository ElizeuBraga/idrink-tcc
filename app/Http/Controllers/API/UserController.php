<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Input;
use Mail;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Web\Controller;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api',['except' => ['store', 'login', 'index', 'pwdReset']]);
    }

    public function pwdReset(Request $request){
        $pwd = Str::random(8);
        $email = $request->email;
        $data = ['password' => $pwd, 'email' => $request->email];

        Mail::send('auth.passwords.resetApi', ['pwd' => $data], function($message) use($email){
            $message->to($email)->subject('Nova Senha');
            $message->from('idrinktcc@gmail.com');
        });

        if(User::where('email', '=', Input::get('email'))->exists()){
            $user = User::where('email', '=', $request->input('email'))->first();
            $user->password = bcrypt($pwd);
            $user->save();
        }

        return response()->json('Nova senha enviada para o email', 200);
    }
      //Sing in the user to the sistem

    public function login(Request $request){
        // $request->validate([
        //     'email' => 'required|string|email',
        //     'password' => 'required|string',
        // ]);

        // $credencials = [
        //     'email' => $request->email,
        //     // 'type' => 'customer',
        //     'password' => $request->password,
        // ];

        // if(!Auth::attempt($credencials)){
        //     return response()->json(['response' => 'Acesso negado!'], 401);
        // }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = $request->user();
            return  response()->json([$user, 'token' => $user->api_token], 200);
        }

        return response()->json(['response' => 'Acesso negado!'], 401);
    }

    /**
     * Logout a user of the sistem
     */
    public function logout(){
        $user = Auth::user();
        $user->api_token = Str::random(60);
        $user->save();
        return response()->json(['response' => 'Deslogado com sucesso']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('type', 'customer')->get();

        return response()->json($users, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ];

        $messages = [
            'email.email' => 'Email inválido',
            'email.required' => 'Preencha o campo email',
            'unique' => 'Esse email já existe',
            'password.confirmed' => 'Senhas não conferem'
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()], 400);
        }

        $user = new User([
            'name' => $request->get('name'),
            'type' => 'customer',
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'cpf' => $request->get('cpf'),
            'cep' => $request->get('cep'),
            'api_token' => Str::random(60),
            'password' => Hash::make($request->get('password')),
        ]);

        $user->save();

        return  response()->json([$user, 'token' => $user->api_token], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find(Auth::user()->id);

        return response()->json($user, 200);
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
            $user = User::find($id);
            $user->update($request->all());
            // $user->api_token = Str::random(60);
            $user->password = Hash::make($request->password);
            $user->save();

            return response()->json([$user,'token' => $user->api_token], 200);
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
