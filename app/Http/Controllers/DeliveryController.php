<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        // return response()->json(['Response' => 'Ola deliveries']);
        // $deliveries = DB::table('deliveries')
        // ->join('users', 'user.id', '=', 'deliveries.user_id')
        // ->join('deliveries', 'adress.id', '=', 'deliveries.adress_id')
        // ->get();

        // if(count($deliveries) == 0 ){
        //     return response()->json(['response' => 'Nenhum pedido encontrado']);
        // }
        // return view('deliveries', compact('deliveries'));
        return view('deliveries');
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
