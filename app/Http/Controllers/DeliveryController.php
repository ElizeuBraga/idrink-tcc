<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class DeliveryController extends Controller
{

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
        ->select('deliveries.id', 'deliveries.store_id', 'deliveries.customer_id', 'users.customername',  'users.storename', 'deliveries.status', 'deliveries.payment')
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
