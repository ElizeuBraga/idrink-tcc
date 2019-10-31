<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Delivery;
use App\Item;
use Auth;
use DB;
use App\Http\Controllers\Web\Controller;


class DeliveryController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveries = Delivery::where('customer_id', Auth::user()->id)->get();

        return response()->json($deliveries, 200);
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
        try {
            $delivery = Delivery::create($request->all());
            $deliveries = DB::table('users as s')
        ->join('deliveries as d', 'd.store_id', '=', 's.id')
        ->join('users as c', 'c.id', '=', 'd.customer_id')
        ->join('adresses as a', 'a.id', '=', 'd.address_id')
        ->select('d.store_id','d.total_price', 'd.id','s.name as store_name', 'c.name as customer_name', 'c.phone', 'd.payment', 'd.status', 'd.change', 'a.localidade', 'a.logradouro', 'a.complemento', 'a.numero', 'a.bairro', 'd.created_at')
        ->where('s.id', $delivery->store_id)
        ->orderBy('d.created_at', 'DESC')
        ->first();

            broadcast(new \App\Events\PrivateEvent($deliveries));
            return response()->json($delivery ,200);
        } catch (\Throwable $th) {
            // return response()->json(['response'=>'erro'], 400);
            return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $delivery = Delivery::find($id);
        return response()->json($delivery, 200);
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
        try {
            $delivery = Delivery::find($id);
            $delivery->update($request->all());
            $delivery->save();
            $alterado = Delivery::find(1);

            return response()->json($alterado);

        } catch (\Throwable $th) {
            return $th;
            // return response()->json(['response'=>'Erro']);
        }
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

    public function deliveriesOpen(){
        $user = Auth::user();
        
        $deliveries = DB::table('users as s')
        ->join('deliveries as d', 'd.store_id', '=', 's.id')
        ->join('users as c', 'c.id', '=', 'd.customer_id')
        ->select('d.id','s.name as store_name', 'c.name as customer_name', 'd.payment')
        ->where('d.customer_id', $user->id)
        ->where('d.status', 'open')
        ->get();
        
        return response()->json($deliveries, 200);
    }

    public function deliveriesCanceledDelivered(){
        $user = Auth::user();
        
        $deliveries = DB::table('users as s')
        ->join('deliveries as d', 'd.store_id', '=', 's.id')
        ->join('users as c', 'c.id', '=', 'd.customer_id')
        ->select('d.id','s.name as store_name', 'c.name as customer_name', 'd.payment')
        ->where('d.customer_id', $user->id)
        ->where('d.status', 'canceled')
        ->orWhere('d.status', 'delivered')
        ->get();
        
        
        return response()->json($deliveries, 200);
    }
    
    public function deliverieItems($delivery_id){
        $user = Auth::user();
        
        $items = DB::table('users as s')
        ->join('deliveries as d', 'd.store_id', '=', 's.id')
        ->join('users as c', 'c.id', '=', 'd.customer_id')
        ->join('items as i', 'i.delivery_id', '=', 'd.id')
        ->join('products as p', 'i.product_id', '=', 'p.id')
        ->select('i.delivery_id', 'i.quantity', 'p.name as product_name', 'p.price as price', DB::raw('p.price * i.quantity as parcial_price'))
        ->where('d.customer_id', $user->id)
        ->where('i.delivery_id', $delivery_id)
        ->get();
                
        return response()->json($items, 200);
    }
}
