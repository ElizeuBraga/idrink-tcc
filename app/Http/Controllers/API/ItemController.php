<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Item;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Web\Controller;

class ItemController extends Controller
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
        $items = Item::where('customer_id', Auth::user()->id)->get();

        return response()->json($items, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Item::create($request->all());
        // $items = $request->getContent();
        // $items->toArray();
        // dd(json_decode($request->getContent(), true));
        // DB::table('items')->insert($items);
        return response()->json($item, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Item::where('id', $id)->get();

        return response()->json($items, 200);
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
            $item = Item::find($id);
            $item->update($request->all());
            $item->save();

            return response()->json($item, 200);

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
    
    public function items($delivery_id){
        $user = Auth::user();
        
        $items = DB::table('users as c')
        ->select('d.id as delivery_id','i.quantity','p.price', 'i.parcial_price', 'p.name as product_name')
        ->join('deliveries as d', 'd.customer_id', 'c.id')
        ->join('items as i', 'i.delivery_id', 'd.id')
        ->join('products as p', 'i.product_id', 'p.id')
        ->where('d.id', '=', $delivery_id)
        ->where('d.customer_id', '=', $user->id)
        ->get();
        
        return response()->json($items, 200);
    }
}
