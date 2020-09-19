<!-- @extends('layout.main') -->
<!-- @extends('welcome') -->
@section('nav')
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.html">Coffee<small>Blend</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="{{route('manager.index')}}" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="{{route('manager.allFood')}}" class="nav-link">Coffee List</a></li>
            <li class="nav-item"><a href="{{route('manager.add')}}" class="nav-link">Post new Item</a></li>
            <li class="nav-item"><a href="about.html" class="nav-link">Delivery man</a></li>
            <li class="nav-item"><a href="about.html" class="nav-link">Reviews</a></li>
            <li class="nav-item"><a href="about.html" class="nav-link">Delivery man</a></li>
            <li class="nav-item"><a href="about.html" class="nav-link">New arrival</a></li>
            <li class="nav-item"><a href="about.html" class="nav-link">Balance Sheet</a></li>
            <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
            <li class="nav-item"><a href="about.html" class="nav-link">Logout</a></li>


            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact us</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="shop.html">Facebook</a>
                <a class="dropdown-item" href="product-single.html">Mobile</a>
                <a class="dropdown-item" href="room.html">Email</a>
              </div>
            </li>
            <li class="nav-item"><a href="{{route('logout.index')}}" class="nav-link">Logout</a></li>
            <li class="nav-item cart"><a href="" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>1</small></span></a></li>
          </ul>
        </div>
      </div>
    </nav>
@endsection
