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
        DB::enableQueryLog();

        $deliveries = Delivery::join('users as u','u.id', '=', 'deliveries.customer_id')
        ->join('users as u2', 'u2.id', '=', 'deliveries.store_id')
        ->select('deliveries.id as delivery_id', 'deliveries.payment', 'deliveries.status', 'u.name as customer_name', 'u2.id as store_id')
        ->where('store_id', Auth::user()->id)
        ->orderBy('status')
        ->get();

        $items = Delivery::join('users as u','u.id', '=', 'deliveries.customer_id')
        ->join('users as u2', 'u2.id', '=', 'deliveries.store_id')
        ->join('items', 'items.delivery_id', '=', 'deliveries.id')
        ->join('products', 'products.id', '=', 'items.product_id')
        ->select('deliveries.id as delivery_id', 'products.id as product_id', 'products.name as product_name')
        ->where('store_id', Auth::user()->id)
        ->get();

        // $queries = DB::getQueryLog();

        // dd($items);

        return view('deliveries', compact('deliveries', 'items'));
    }
    
    public function create()
    {
        //
    }

    public function store(Request $request, $delivery_id)
    {
        $delivery = Delivery::find($delivery_id);
        if(isset($delivery)){
            $delivery->status = $request->input('status');
            $delivery->save();
        }
        if ($delivery->status == 'canceled') {
            return redirect('/entregas')->with('canceled', 'Cancelado com sucesso!');
        }

        if ($delivery->status == 'open') {
            return redirect('/entregas')->with('actived', 'Reativado com sucesso!');            
        }
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
