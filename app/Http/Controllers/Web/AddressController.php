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
        $user = Auth::user();
        $adressUser = Address::where('user_id', $user->id)
                                ->where('status', 1)
                                ->get();
        $cep = ZipCode::find($request->cep);
        if($cep != null){
            $cepArray = $cep->getArray();
            // dd($cepArray);
            // return view('profile' ,array('cepArray' => $cepArray, 'user' => $user, 'adressUser' => $adressUser));
            return redirect()->back()->with('cepArray', $cepArray);
        }

        return redirect()->back();
        // return redirect()->route('users.edit', array('user' => Auth::user()));
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
        $adresses = Address::where('user_id', Auth::user()->id)->where('status', 1)->get();
        $cep = ZipCode::find($request->cep);
        if($cep != null){
            $cepArray = $cep->getArray();
            return Redirect::route('users.edit', Auth::user()->id)->with(array('user' => Auth::user(), 'adressUser' => $adresses, 'cepArray' => $cepArray));
        }

        return Redirect::route('users.edit', Auth::user()->id)->with(array('user' => Auth::user(), 'adressUser' => $adresses));
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
        $adresses = Address::where('user_id', Auth::user()->id)->where('status', 1)->get();

        return redirect()->back();
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
        return redirect()->back()->with('success', 'Feito');
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
