<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', [
        'products' => Product::all() 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create'); 
           
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => [ 'required', 'string', 'max:50' ],
            'value' => [ 'required','integer' ],
            'description' => [ 'required', 'string'],
        ]); 
        $image = '';
        if ($request->file('productcover') != null){
            $image = $this->get_and_save_image($request->file('productcover'));
        }
        product::create([
            'name' => $request->get('name'), 
            'value' => $request->get('value'), 
            'description' => $request->get('description'), 
            'status' => $request->get('status'), 
            'image' => $image, 
        ]);

                return redirect()->route('product.index');
    }
    public function get_and_save_image($productcover){
        $extension = $productcover->getClientOriginalExtension();
             
        Storage::disk('public')->put($productcover->getFilename() . '.' . $extension,       
        File::get($productcover));
        return $productcover->getFilename() . '.' . $extension;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('Products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('Products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => [ 'required', 'string', 'max:50' ],
            'value' => [ 'required','integer' ],
            'description' => [ 'required', 'string'],
        ]); 
        if ($request->file('productcover') != null){
            $product->image = $this->get_and_save_image($request->file('productcover'));
           }
          
             
     
        $product->name = $request->get('name');
        $product->value = $request->get('value');
        $product->description = $request->get('description');
        $product->status = $request->get('status');
        $product->save();
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
       //Product::destroy($product->id);

       $product->delete(); 
       return redirect()->route('product.index');
    
    }


    public function listado()
    {
    return view('products.listado', [
    'products' => Product::all() 
    ]);
    }
}
