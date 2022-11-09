
@extends('layouts.main')

@section('container')

<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/products">
            @if (request('user'))
            <input type="hidden" name="user" value="{{ request('user') }}">
            @endif
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('user') }}">
            <button class="btn btn-danger" type="submit">Search</button>
        </div>
        </form>
    </div>
</div>

@if ($products->count())
<div class="card mb-3">
        <div style="max-height: 400px; position: center; 900px; overflow:hidden;">
        </div>
  <div class="card-body text-center">
    <h3 class="card-title"><a href="/products?user={{ $products[0]->slug }}" class="text-decoration-none text-dark">{{ $products[0]->name_product }}</a></h3>
    <h4 class="card-title"><a href="/products?user={{ $products[0]->slug }}" class="text-decoration-none text-dark">{{ $products[0]->price_product }}</a></h4>
    
    <p><small class="text-muted">By. <a href="/products?user={{ $products[0]->user->username }}"> {{ $products[0]->user->name   }}</a> {{ $products[0]->created_at->diffForHumans() }}</small></p>

    <a href="/products/{{$products[0]->slug }}" class="text-decoration-none btn btn-primary"> Add to Cart</a>
    <a href="/orders/{{$products[0]->user->username }}" class="text-decoration-none btn btn-primary">Checkout</a>

</p>
  </div>
</div>

<div class="container">
    <div class="row">
        @foreach ($products as $products)
        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
        <div class="position-absolute bg-dark px-3 py-3 text-white" style="background-color: rgba(0, 0, 0, 0.7)">
        <a href="#" class="text-white text-decoration-none">#</a></div>
        <img src="{{ asset('storage/' . $products->image) }}" alt="#">
    <div class="card-body">
    <h5 class="card-title">{{ $products->name_product }}</h5>
    <h6 class="card-title">{{ $products->price_product }}</h6>
    <p><small class="text-muted">By. 
        <a href="/products?user={{ $products->user->username }}"> {{ $products->user->name   }}</a> 
        <a href="#" class="text-decoration-none">
        </a> {{ $products->created_at->diffForHumans() }}</small></p>
    <p class="card-text"></p>
    <a href="/products/{{ $products->slug }}" class="btn btn-primary">Add Cart</a>
    <a href="/orders/{{ $products->user->username }}" class="btn btn-primary">Checkout</a>
  </div>
</div>
        </div>
        @endforeach
    </div>
</div>
@else
<p class="text-center fs-4">No post found.</p>
@endif

<!-- <div class="d-flex justify-content-end">
{{ $products->paginate()->links() }}
</div> -->

    @endsection