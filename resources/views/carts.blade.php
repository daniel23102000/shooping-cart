<h1>this is cart</h1>

<div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Name Product</th>
              <th scope="col">Price Product</th>
              <th scope="col">Quantity</th>
              <th scope="col">Product Code</th>
              <th scope="col">Total Price</th>
              <th scope="col">Created At</th>
              <th scope="col">Updated At</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($cart as $crt)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $crt->name_product }}</td>
              <td>{{ $crt->product_price }}</td>
              <td>{{ $crt->qty }}</td>
              <td>{{ $crt->product_code }}</td>
              <td>{{ $crt->total_price }}</td>
              <td>{{ $crt->created_at }}</td>
              <td>{{ $crt->updated_at }}</td>
              <td>
                <a href="/products?user={{ $crt->product_ownerusername }}" class="badge bg-info">Back To Products</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>