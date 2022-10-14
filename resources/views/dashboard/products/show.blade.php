@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $product->name_product }}</h1>
            <h3 class="mb-3">{{ $product->price_product }}</h3>
            <a href="/dashboard/products" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all my products</a>
            <a href="/dashboard/products/{{ $product->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <form action="/dashboard/products/{{ $product->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                  <span data-feather="x-circle"></span> Delete</button>
                </form>
        
        <article class="my-3 fs-5">
            {!! $product->about_product !!}
        </article>
        </div>
    </div>
</div>
@endsection