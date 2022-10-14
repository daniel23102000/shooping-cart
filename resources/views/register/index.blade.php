<!DOCTYPE html>  
<html>  
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<style>  
body{  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: pink;  
}  
.container {  
    padding: 50px;  
  background-color: lightblue;  
}  
  
input[type=text], input[type=password], textarea {  
  width: 100%;  
  padding: 15px;  
  margin: 5px 0 22px 0;  
  display: inline-block;  
  border: none;  
  background: #f1f1f1;  
}  
input[type=text]:focus, input[type=password]:focus {  
  background-color: orange;  
  outline: none;  
}  
 div {  
            padding: 10px 0;  
         }  
hr {  
  border: 1px solid #f1f1f1;  
  margin-bottom: 25px;  
}  
.registerbtn {  
  background-color: #4CAF50;  
  color: white;  
  padding: 16px 20px;  
  margin: 8px 0;  
  border: none;  
  cursor: pointer;  
  width: 100%;  
  opacity: 0.9;  
}  
.registerbtn:hover {  
  opacity: 1;  
}  
</style>  
</head>  
<body>  
<form action="/register" method="post">
      @csrf

    <div class="form-floating">
    <label for="name">Name</label>
      <input type="text" name="name" class="form-control rounded-top @error('name')is-invalid @enderror" 
      id="name" placeholder="Name" required value="{{ old('name') }}">
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating">
    <label for="username">Username</label>
      <input type="text" name="username" class="form-control @error('username')is-invalid @enderror" id="username" 
      placeholder="Username" required value="{{ old('username') }}">
      @error('username')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating">
    <label for="email">Email address</label>
      <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email" 
      placeholder="name@example.com" required value="{{ old('email') }}">
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating">
    <label for="password">Password</label>
      <input type="password" name="password" 
      class="form-control rounded-bottom @error('password')is-invalid @enderror" id="password" 
      placeholder="Password" required>
      @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
  </form>
</body>  
</html> 