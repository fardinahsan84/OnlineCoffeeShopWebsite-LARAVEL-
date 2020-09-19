@extends('welcome')
@section('nav-bar')
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.html">Coffee<small>Blend</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="{{('/')}}" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="{{('login')}}" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="{{('register')}}" class="nav-link">Register</a></li>
            <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
            <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="shop.html">Shop</a>
                <a class="dropdown-item" href="product-single.html">Single Product</a>
                <a class="dropdown-item" href="room.html">Cart</a>
                <a class="dropdown-item" href="checkout.html">Checkout</a>
              </div>
            </li>
            <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
            <li class="nav-item cart"><a href="cart.html" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>1</small></span></a></li>
          </ul>
        </div>
      </div>
    </nav>
@endsection
<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
</head>
<center>
<body>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
	<h1>Login</h1>

	<form method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">

		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
      <tr>
        <td><br></td>
      </tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
      <tr>
        <td><br></td>
      </tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-primary" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>

	{{session('msg')}}
</body>
</center>
</html>
