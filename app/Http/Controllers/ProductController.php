<?php

namespace App\Http\Controllers;


use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     Public function __construct()
     {
         $this->middleware('auth:api')->except('show','index');
     }

    public function index()
    {
        // echo "<pre>";
      return   ProductCollection::collection(Product::all());
        // echo "</pre>";
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
    public function store(ProductRequest $request)
    {
        $product= new Product();
        $product->name=$request->name;
        $product->detail=$request->descreption;
        $product->stock=$request->stock;
        $product->price=$request->price;
        $product->discount=$request->discount;
        $product->user_id=Auth::id();
        $product->save();
        return  new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    { 

        if(Auth::id()==$product->user_id)
        {
           $request['detail']=$request->descreption;
        unset($request['descreption']);
        $product->update($request->all());
        return $product; 
        }
        else
        {
            return response()->json (
               [ 
                   'error'=>"product Not Belongs To User"
               
               ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    { 
        $product->delete();
      return response($product,204);
    }
}
