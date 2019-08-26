<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use App\Provider;
use Auth;
 
class ProductController extends Controller
{
    
    /**
     * Return view products
     */
    public function index()
    {
        return view('products.products');
    }

    /**
     * Return view with products actives
     */
    public function active(){
        $activeProducts = DB::table('products')
            ->where('status', '=', 'active')
            ->where('user_id', '=', Auth::user()->id)->get();

        return view('products.active-products', compact('activeProducts'));
    }

    /**
     * Return view with all products
     */
    public function allProducts(){
        $allProducts = DB::table('products')
            ->where('user_id', '=', Auth::user()->id)->get();

        return view('products.products', compact('allProducts'));
    }

    /**
     * Return view with products inactives
     */
    public function inactive(){
        $inactiveProducts = DB::table('products')
            ->where('status', '=', 'inactive')
            ->where('user_id', '=', Auth::user()->id)->get();

        return view('products.inactive-products', compact('inactiveProducts'));
    }

    /**
     * Return view to create a new product
     */
    public function create()
    {
        return view('products.newProducts');
    }

    /**
     * Store a new product in the database
     */
    public function store(Request $request, Product $product)
    {
        // dd('Estou aqui em: CategoryController no método store()');
         $request->price = str_replace(',', '.', $request->price);
         $prod = [
             'user_id' => Auth::user()->id,
             'name' => $request->name,
             'price' => $request->price
         ];

         $insert = $product->create($prod);

         if($insert){
            return redirect()
                ->back()
                ->with('success', 'Inserido com sucesso');
         }

         return redirect()
            ->back()
            ->with('error', 'Falha ao salvar o produto');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    /**
     * Desactive a product
     * 
     */
    public function update(Request $request, $id)
    {
        $product = \App\Product::find($id);
        $product->status = $request['status'];
        $product->save();
        return redirect()->back()->with('success', 'Desativado com sucesso');
    }

    /**
     * Active a product
     */
    public function toActiveProduct(Request $request, $id)
    {
        $product = \App\Product::find($id);
        $product->status = $request['status'];
        $product->save();
        return redirect()->back()->with('success', 'Ativado com sucesso');
    }

    /**
     * Delete a product
     */
    public function destroy($id)
    {
        $product = \App\Product::find($id);
        $product->providers()->delete();
        return redirect()->back()->with('success', 'Excluido com sucesso');
    }
}
