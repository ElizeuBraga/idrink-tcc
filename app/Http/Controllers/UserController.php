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
use App\Delivery;

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
            // 'customer_type' => 'required|string'
        ]);

        // $input = $request->all();

        $credencials = [
            'email' => $request->email,
            'type' => 'customer',
            'password' => $request->password,
        ];

        if($credencials['type'] !== 'customer'){
            return response()->json(['response' => 'Tipo de usuario não permitido'], 401);
        }

        if(!Auth::attempt($credencials)){
            return response()->json(['response' => 'Acesso negado!'], 401);
        }

        $user = $request->user();
        $token = $user->createToken('Token de acesso')->accessToken;

        return response()->json([$user,'token' => $token], 200);
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
            'password' => Hash::make($request->get('password')),
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

    public function edit(User $user)
    {
        $user = Auth::user();
        return response()->json($user, 200);
    }

    public function update(User $user)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ]);

        $user->name = request('name');
        $user->cpf = request('cpf');
        $user->phone = request('phone');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        $user->save();

        return response()->json($user, 200);
    }

    public function destroy($id)
    {
        //
    }

    public function allStores(){
        $stores = User::where('type', 'store')->get();

        return response()->json($stores, 200);
    }

    public function getStoreName($nome){
        $loja = User::where('type', 'store')
        ->where('name', 'like', '%'.$nome.'%')
        ->get();

        return response()->json($loja, 200);
    }

    public function storeProducts($user_id){
        $products = User::find($user_id)->products;

        return response()->json($products, 200);
    }

    public function usrReportDeliveries(){
        $user_id = Auth::id();

        $deliveries = DB::table('deliveries as d')
        ->select('d.id', 'd.payment', 'd.status')
        ->where('customer_id', $user_id)->get();

        $items = DB::table('items as i')
        ->select('d.id','i.delivery_id', 'i.quantity', 'p.name', 'p.price', DB::raw('p.price * i.quantity as total_parcial'))
        ->join('deliveries as d', 'd.id','=', 'i.delivery_id')
        ->join('products as p', 'i.product_id','=', 'p.id')
        ->where('d.customer_id', $user_id)
        ->get();

        return response()->json( [$deliveries, $items],200);
    }
}
