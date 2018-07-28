

@extends('layouts.app')
@section('title','home')

@section('content')




      <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
        <h1 class="display-3">A Warm Welcome!</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
        <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
      </header>
     
      <!-- Page Features -->
      <div class="row text-center">

       
        @foreach($products as $product)
       {{-- http://placehold.it/500x325 --}}

      
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="/storage/{{ rand(1,6) }}.jpg"  height="325" alt="">
            <div class="card-body">
              <h4 class="card-title">{{ $product->name }}</h4>
              <p class="card-text">Price : {{ $product->price }}</p>
            </div>
            <div class="card-footer">
              <a href="/products/{{ $product->id }}" class="btn btn-primary">Find Out More!</a>
            </div>
            
          </div>
        </div>

     
        @endforeach

        

      </div>
      {{ $products->Links() }}

@endsection

