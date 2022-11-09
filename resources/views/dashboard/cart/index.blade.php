@extends('dashboard.layouts.main')

@section('container')
<h1>this is cart</h1>

<div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Buyer User</th>
              <th scope="col">Name Product</th>
              <th scope="col">Price Product</th>
              <th scope="col">Quantity</th>
              <th scope="col">Product Code</th>
              <th scope="col">Created At</th>
              <th scope="col">Updated At</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($cart as $crt)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $crt->buyer_user }}</td>
              <td>{{ $crt->name_product }}</td>
              <td>{{ $crt->product_price }}</td>
              <td>{{ $crt->qty }}</td>
              <td>{{ $crt->product_code }}</td>
              <td>{{ $crt->created_at }}</td>
              <td>{{ $crt->updated_at }}</td>
              <td>
              <form action="/dashboard/cart/{{ $crt->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                  <span data-feather="x-circle"></span></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection