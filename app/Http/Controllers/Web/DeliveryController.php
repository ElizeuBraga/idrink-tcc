<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Auth;
use App\Delivery;
use DB;
use Arr;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        // s = store, c = customer;
        $deliveries = DB::table('users as s')
        ->join('deliveries as d', 'd.store_id', '=', 's.id')
        ->join('users as c', 'c.id', '=', 'd.customer_id')
        ->join('adresses as a', 'a.id', '=', 'd.address_id')
        ->select('d.id','s.name as store_name', 'c.name as customer_name', 'c.phone', 'd.payment', 'd.status', 'd.change', 'a.localidade', 'a.logradouro', 'a.complemento', 'a.numero', 'a.bairro')
        ->where('s.id', $user->id)
        ->get();

        $items = DB::table('users as s')
        ->join('deliveries as d', 'd.store_id', '=', 's.id')
        ->join('users as c', 'c.id', '=', 'd.customer_id')
        ->join('items as i', 'i.delivery_id', '=', 'd.id')
        ->join('products as p', 'i.product_id', '=', 'p.id')
        ->select('i.delivery_id','p.price', 'i.quantity', 'p.name as product_name', DB::raw('(p.price * i.quantity) as parcial_price'))
        ->where('s.id', $user->id)
        ->get();

        return view('deliveries', compact('deliveries', 'items'));
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
        $delivery = Delivery::find($id);
        $delivery->update($request->all());
        $delivery->save();

        if ($delivery->status == 'canceled') {
            return redirect()->back()->with('warning', 'Pedido cancelado!');
        }elseif($request->status == 'delivered'){
            return redirect()->back()->with('success', 'Pedido a caminho!');
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
