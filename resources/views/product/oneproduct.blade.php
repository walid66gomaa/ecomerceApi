@extends('layouts.app')

@section('head')
@section('title')
{{ $product->name }}
@endsection


<link href="{{ asset('css/oneproduct.css') }}" rel="stylesheet">

@endsection


@section('content')




      {{-- <img class="card-img-top" src="/storage/{{ rand(1,6) }}.jpg"  alt=""> --}}
      <div class="card">
            <div class="row">
                <aside class="col-sm-5 border-right">
        <article class="gallery-wrap"> 
        <div class="img-big-wrap">
          <div> <a href="#"><img src="/storage/{{ rand(1,6) }}.jpg" ></a></div>
        </div> <!-- slider-product.// -->
      
        </article> <!-- gallery-wrap .end// -->
                </aside>
                <aside class="col-sm-7">
        <article class="card-body p-5">
            <h3 class="title mb-3">Original Version of Some product name</h3>
        
        <p class="price-detail-wrap"> 
            <span class="price h3 text-warning"> 
                <span class="currency">US $</span><span class="num">{{ $product->price }}</span>
            </span> 
            <span>/per one</span> 
        </p> <!-- price-detail-wrap .// -->

        <dl class="item-property">
                <dt>Name</dt>
                <dd><p>{{ $product->name }} </p></dd>
              </dl>

        <dl class="item-property">
          <dt>Description</dt>
          <dd><p>{{ $product->detail }} </p></dd>
        </dl>
        <dl class="param param-feature">
          <dt>Rate</dt>
        
          @for($i=0 ;$i<=$product->reviews()->avg('star') ; $i++)
          <i class="fa fa-star" aria-hidden="false"></i>
          @endfor
        </dl>  <!-- item-property-hor .// -->
     
        <dl class="param param-feature">
          <dt>discount</dt>
          <dd>{{ $product->discount }}%</dd>
        </dl>  <!-- item-property-hor .// -->
       
        
       
        </article> <!-- card-body.// -->
                </aside> <!-- col.// -->
            </div> <!-- row.// -->
        </div> 


        @foreach($product->reviews as $review)
        <!-- Single Comment -->
        <hr>
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">{{$review->customer}}</h5>
           <p>{{$review->review}}</p>
          </div>
          <dt>Rate</dt>
          <div class="media-body">
          @for($i=0 ;$i<=$review->star ; $i++)
          <i class="fa fa-star" aria-hidden="false"></i>
          @endfor
          </div>
        </div>
        @endforeach


      @endsection