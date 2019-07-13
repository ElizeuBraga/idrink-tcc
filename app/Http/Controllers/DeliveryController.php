<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class DeliveryController extends Controller
{
    //Metodos para api
    public function getDeliveriesCustomer(){
        $deliveries = DB::table('products')
        ->join('users as u', 'u.id', '=', 'products.user_id')
        ->join('items', 'products.id', '=', 'items.product_id')
        ->join('deliveries', 'deliveries.id', '=', 'items.delivery_id')
        ->join('users as u2', 'u2.id', '=', 'deliveries.customer_id')
        ->select('u.name as store_name', 'products.name as product_name',
         'items.quantity', 'deliveries.payment', 'products.price as unit_price',
         DB::raw('price * quantity as total_price'))
        ->where('u2.id', '=', Auth::user()->id)
        ->get();

        return response()->json($deliveries, 200);
    }

    public function getDeliveriesCustomerStoreId($store_id){
        $deliveries = DB::table('products')
        ->join('users as u', 'u.id', '=', 'products.user_id')
        ->join('items', 'products.id', '=', 'items.product_id')
        ->join('deliveries', 'deliveries.id', '=', 'items.delivery_id')
        ->join('users as u2', 'u2.id', '=', 'deliveries.customer_id')
        ->select('u.name as store_name', 'products.name as product_name',
         'items.quantity', 'deliveries.payment', 'products.price as unit_price',
         DB::raw('price * quantity as total_price'))
        ->where('u.id', '=', $store_id)
        ->where('u2.id', '=', Auth::user()->id)
        ->get();

        return response()->json($deliveries, 200);
    }

    public function getDeliveries(){
        $deliveries = DB::table('deliveries')->get();

        if(count($deliveries) == 0 ){
            return response()->json(['response' => 'Nenhum pedido encontrado']);
        }
        return view('deliveries', compact('deliveries'));
        // return response()->json($deliveries);
    }

    public function index()
    {
        $deliveries = DB::table('deliveries')
        ->join('users', 'users.id', '=', 'deliveries.customer_id')
        ->select('deliveries.id', 'deliveries.store_id', 'deliveries.customer_id', 'users.name',  'users.name', 'deliveries.status', 'deliveries.payment')
        // ->join('adresses', 'users.id', '=', 'adresses.customer_id')
        ->where('users.type', '=', 'customer')
        ->where('deliveries.store_id', '=', Auth::user()->id)
        ->get();

        // return response()->json($deliveries);
        return view('deliveries', compact('deliveries'));
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
