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

    public function return_items_delivery($delivery_id)
    {
        $item = DB::table('deliveries')
        ->select('items.quantity', 'products.name as product_name')
        ->join('users as u', 'u.id', '=', 'deliveries.store_id')
        ->join('users as u2', 'u2.id', '=', 'deliveries.customer_id')
        ->join('items', 'items.delivery_id', '=', 'deliveries.id')
        ->join('products', 'products.id', '=', 'items.product_id')
        ->where('deliveries.id', '=', $delivery_id)
        ->get();
        
        return $item;
    }

    public function index()
    {
        $delivery = DB::table('deliveries')
        ->select('deliveries.id as delivery_id','u.name as store_name', 'u2.name as customer_name',
         'deliveries.payment', 'deliveries.status')
        ->join('users as u', 'u.id', '=', 'deliveries.store_id')
        ->join('users as u2', 'u2.id', '=', 'deliveries.customer_id')
        ->where('u.id', '=', Auth::user()->id)
        ->get();

        // dd($deliveries);
        return view('deliveries', compact('delivery'));
    }

    
    
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
