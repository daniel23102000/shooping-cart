
@extends('layouts.main')

@section('container')
<h1 class="mb-3 text-center">{{ $user }}</h1>

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/blog">
            @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('author') }}">
            <button class="btn btn-danger" type="submit">Search</button>
        </div>
        </form>
    </div>
</div>

@if ($products->count())
<div class="card mb-3">
        <div style="max-height: 400px; overflow:hidden;">
        </div>
  <div class="card-body text-center">
    <h3 class="card-title"><a href="/example?user={{ $products[0]->slug }}" class="text-decoration-none text-dark">{{ $products[0]->name_product }}</a></h3>
    
    <p><small class="text-muted">By. <a href="/products/{{ $products[0]->user->username }}"> {{ $products[0]->user->name   }}</a> {{ $products[0]->created_at->diffForHumans() }}</small></p>
    
    <p class="card-text">{{ $products[0]->about_product }}</p>

    <a href="/products/{{$products[0]->slug }}" class="text-decoration-none btn btn-primary"> Add to Cart</a>

</p>
  </div>
</div>

<div class="container">
    <div class="row">
        @foreach ($products as $products)
        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
        <div class="position-absolute bg-dark px-3 py-3 text-white" style="background-color: rgba(0, 0, 0, 0.7)">
    <div class="card-body">
    <h5 class="card-title">{{ $products->name_product }}</h5>
    <p><small class="text-muted">By. 
        <a href="/products/{{ $products->user->username }}"> {{ $products->user->name   }}</a> 
        in 
        </a> {{ $products->created_at->diffForHumans() }}</small></p>
    <p class="card-text">{{ $products->about_product }}</p>
    <a href="/products/{{ $products->slug }}" class="btn btn-primary">Add To Cart</a>
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