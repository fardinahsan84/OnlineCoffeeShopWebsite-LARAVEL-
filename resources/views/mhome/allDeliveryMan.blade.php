
@extends('welcome')
<!DOCTYPE html>
<html>
<head>
	<title>All Delivery man </title>
  <style>
    table.center {
          margin-left: auto;
          margin-right: auto;
        }
  			h3 {text-align: right;}
				ul {
				list-style-type: none;
				margin: 0;
				padding: 0;
				overflow: hidden;
				background-color: #333;
				}

				li {
				float: left;
				width: 12.5%;
				}

				li a {
				display: block;
				color: white;
				text-align: center;
				padding: 14px 16px;
				text-decoration: none;
				}

				li a:hover {
				background-color: #111;
				}

        legend {
          background-color: gray;
          color: white;
          padding: 5px 10px;
        }
				</style>

				</head>
				<body>
				<ul>
					<li><a href="{{route('manager.index')}}">Home</a></li>
					<li><a href="{{route('manager.allFood')}}">Coffee List</a></li>
					<li><a href="{{route('manager.add')}}">Post new Item</a></li>
					<li><a href="{{route('manager.allDeliveryMan')}}">Delivery man</a></li>
					<li><a href="{{route('manager.newArrival')}}">New Arrival</a></li>
					<li><a href="{{route('manager.allFood')}}">Reviews</a></li>
					<li><a href="{{route('manager.report')}}">Balance sheet</a></li>
					<li><a href="{{route('logout.index')}}">Logout</a><li>
				</ul>
<div class="p-3 mb-2 bg-primary text-white">

<form method="post">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
    <center>
      <h1>All Delivery man items</h1>
      <h2>Manager: {{ Session::get('username')}}</h2>
    </center>
     <h3><a href="{{route('manager.index')}}" class="btn btn-secondary btn-xs" >Back</a></h3>

      @foreach($DList as $dman)
       <fieldset>
        <table class="center">
        <legend><h4>{{$dman['name']}}</h4></legend>
      <tr>
        <th>ID</th><td>:{{$dman['id']}}</td><td></td>
      </tr>
      <tr>
        <th>NAME</th><td>:{{$dman['name']}}</td>
      </tr>
      <tr>
        <th>Phone</th><td>:{{$dman['phone']}}</td>
      </tr
      <tr>
        <th>Address</th><td>:{{$dman['address']}}</td>
      <tr>
        <th>Email</th><td>:{{$dman['email']}}</td>
      </tr>
        <th>Gender</th><td>:{{$dman['gender']}}</td>
      </tr>
      </table>
      </fieldset>
      @endforeach
    </form>
</div>
</body>
</html>
