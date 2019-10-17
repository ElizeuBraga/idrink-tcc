<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use ZipCode;
use Auth;
use App\Address;
use Redirect;
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCep(Request $request)
    {
        $cep = ZipCode::find($request->cep);
        if($cep != null){
            $cepArray = $cep->getArray();
            return redirect()->back()->with(array('cepArray' => $cepArray));
        }

        return redirect()->back()->with('erro-cep', 'CEP não encontrado!');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cep = ZipCode::find($request->cep);
        if($cep != null){
            $cepArray = $cep->getArray();
            dd($cepArray);
            return redirect()->back()->with(array('cepArray' => $cepArray));
        }

        dd($cep);
        return redirect()->back()->with('erro-cep', 'CEP não encontrado!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Address::create($request->all());

        return redirect()->back()->with('success-address', 'Feito!');
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
        $address = Address::find($id);
        $address->update($request->all());
        $address->save();

        $adresses = Address::where('user_id', Auth::user()->id)->where('status', 1)->get();
        return redirect()->back()->with('success-address', 'Feito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::find($id);
        $address->delete();
        return redirect()->back()->with('success-address', 'Feito');
    }
}
