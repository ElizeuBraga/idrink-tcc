<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Delivery;
class DeliveryController extends Controller
{
    /**
     * Rotas para web
     * 
     * 
     */
    public function index()
    {
        $deliveries = Delivery::where('store_id', Auth::user()->id)
        ->orderBy('status')
        ->get();

        // dd($deliveries);
        return view('deliveries', compact('deliveries'));
    }
    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
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

    /**
     * Rotas para api
     * 
     * 
     */
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
}
