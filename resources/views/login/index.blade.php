<!DOCTYPE HTML>
<html>
    <head>
        <title>Halaman Login</title>
        <link rel="stylesheet" href="/css/login.css">
    </head>
   
    <body>
        <div class="container">
          <h1>Login</h1>
          @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session()->has('loginError'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session('loginError') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
          <form action="/login" method="post">
      @csrf
    <div class="form-floating">
      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" 
      placeholder="name@example.com" autofocus required value="{{ old('email') }}">
      <label for="email">Email address</label>
      @error('email')
       <div class="invalid-feedback">
         {{ $message }}
       </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="password"name="password" class="form-control" id="password" placeholder="password">
      <label for="password">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
  </form>
            <small class="d-block text-center mt-3">Not registed? <a href="/register">Register Now</a></small>
        </div>     
    </body>
</html>