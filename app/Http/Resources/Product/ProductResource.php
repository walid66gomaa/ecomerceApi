<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
        'name'=>$this->name,
        'descreption'=>$this->detail,
        'price'=>$this->price,
        'stock'=>$this->stock,
        'discount'=>$this->discount,
        'rating'=>$this->reviews()->avg('star'),
        'href'=>[
                  'reviews'=>route('reviews.index',$this->id)
        ]

        ];
    }
}
