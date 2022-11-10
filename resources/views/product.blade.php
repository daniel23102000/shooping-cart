@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h1 class="mb-3">{{ $product->name_product }}</h1>
            <p>By. <a href="/example?author={{ $product->user->username }}"> {{ $product->user->name   }}</a> in 

        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid">
        
        <h5 class="mb-3">Rp. {{ $product->price_product }}</h5>

        <article class="my-3 fs-5">
            {!! $product->about_product !!}
        </article>

    <form method="post" action="/products/{{ $product->slug }}">
    @csrf
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Quantity : </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" class="form-control pqty" name="qty" value="{{ $product->product_qty }}">
                  </div>
                </div>
                <input type="hidden" name="buyer_user" id="buyer_user" value="{{ auth()->user()->id }}"/>
                <input type="hidden" name="product_owner" id="product_owner" value="{{ $product->user->id }}"/>
                <input type="hidden" name="product_ownerusername" id="product_ownerusername" value="{{ $product->user->username }}"/>
                <input type="hidden" name="product_price" id="product_price" value="{{ $product->price_product }}"/>
                <input type="hidden" name="id_product" id="id_product" value="{{ $product->id }}"/>
                <input type="hidden" name="name_product" id="name_product" value="{{ $product->name_product }}">
                <input type="hidden" name="total_price" id="total_price" value="{{ $product->price_product * $product->product_qty}}">
                <input type="hidden" name="image" id="image" value="{{ $product->image }}">
                <input type="hidden" name="product_code" name="product_price" value="{{ $product->product_code }}">

  <button type="submit" class="btn btn-primary">Add to Cart</button>
</form>

        <a href="/products">Back to Posts</a>
        </div>
    </div>
</div>

    @endsection