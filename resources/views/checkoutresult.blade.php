<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">This Is Checkout</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Buyer User</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Address</th>
              <th scope="col">Pmode</th>
              <th scope="col">Created At</th>
              <th scope="col">Updated At</th>
            </tr>
          </thead>
          <tbody>
            @foreach($checkout as $ckt)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $ckt->buyer_user }}</td>
              <td>{{ $ckt->name }}</td>
              <td>{{ $ckt->email }}</td>
              <td>{{ $ckt->phone }}</td>
              <td>{{ $ckt->address }}</td>
              <td>{{ $ckt->pmode }}</td>
              <td>{{ $ckt->created_at }}</td>
              <td>{{ $ckt->updated_at }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>