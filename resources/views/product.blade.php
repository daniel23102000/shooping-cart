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
	<input class="large" type="hidden" name="product_owner" id="product_owner" value="{{ $product->user->id }}"/>

    <input class="large" type="hidden" name="product_price" id="product_price" value="{{ $product->price_product }}"/>

    <input class="large" type="hidden" name="id_product" id="id_product" value="{{ $product->id }}"/>


  <button type="submit" class="btn btn-primary">Add to Cart</button>
</form>

        <a href="/products">Back to Posts</a>
        </div>
    </div>
</div>
    @endsection