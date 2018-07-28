<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Apis;
use App\Http\Controllers\Controller;

use App\Model\Review;
use App\Model\Product;
use Illuminate\Http\Request;
use  App\Http\Resources\ReviewResource;
use App\Http\Requests\ReviewRequest;

class ReviewApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        //
        return ReviewResource::collection($product->reviews);
        // return Review::all();
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
    public function store(ReviewRequest $request ,Product $product)
    {  
        $review=new Review($request->all());
        $product->reviews()->save($review);
        return $review;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, Review $review)
    {
        
        $review->update($request->all());
        $product->reviews()->update($review);
        return  $product->reviews;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product,Review $review)
    {   
        $review->delete();
        return $product->reviews;
    }
}
