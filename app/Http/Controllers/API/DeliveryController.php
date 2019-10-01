<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Delivery;
use Auth;
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
            return response()->json($delivery ,200);
        } catch (\Throwable $th) {
            return response()->json(['response'=>'erro'], 400);
            // return $th;
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
}
