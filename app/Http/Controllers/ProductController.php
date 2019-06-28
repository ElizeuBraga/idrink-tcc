<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use Auth;

class ProductController extends Controller
{
    public function index()
    {
        //
        return view('products.products');
    }

    public function active(){
        $activeProducts = DB::table('products')
            ->where('status', '=', 'active')
            ->where('user_id', '=', Auth::user()->id)->get();

        return view('products.active-products', compact('activeProducts'));
    }

    public function allProducts(){
        $allProducts = DB::table('products')
            ->where('user_id', '=', Auth::user()->id)->get();

        return view('products.products', compact('allProducts'));
    }

    public function inactive(){
        $inactiveProducts = DB::table('products')
            ->where('status', '=', 'inactive')
            ->where('user_id', '=', Auth::user()->id)->get();

        return view('products.inactive-products', compact('inactiveProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.newProducts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        // dd('Estou aqui em: CategoryController no método store()');
         $insert = $product->create($request->all());
         if($insert){
            return redirect()
                ->back()
                ->with('success', 'Inserido com sucesso');
         }

         return redirect()
            ->back()
            ->with('error', 'falha ao salvar o produto');
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
        $product = \App\Product::find($id);
        $product->status = $request['status'];
        $product->save();
        return redirect()->back()->with('success', 'Desativado com sucesso');
    }

    public function toActiveProduct(Request $request, $id)
    {
        $product = \App\Product::find($id);
        $product->status = $request['status'];
        $product->save();
        return redirect()->back()->with('success', 'Ativado com sucesso');
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
        $product = \App\Product::find($id);
        $product->delete();
        return redirect()->back()->with('success', 'Excluido com sucesso');
    }
}
