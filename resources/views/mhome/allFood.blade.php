
@extends('welcome')
<!DOCTYPE html>
<html>
<head>
	<title>Manager home page</title>
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
      <h1>All Coffee items</h1>
      <h2>Manager: {{ Session::get('username')}}</h2>
    </center>
     <h3><a href="{{route('manager.index')}} class="btn btn-secondary btn-xs"">Back</a></h3>

      @foreach($foodList as $food)
       <fieldset>
        <table class="center">
        <legend><h4>{{$food['name']}}</h4></legend>
      <tr>
        <th>ID</th><td>:{{$food['id']}}</td><td></td>
      </tr>
      <tr>
        <th>NAME</th><td>:{{$food['name']}}</td><td><a href="/manager/edit/{{$food['id']}}" class="btn btn-secondary btn-xs"> Edit </a></td>
      </tr>
      <tr>
        <th>Price/item</th><td>:{{$food['price']}}</td><td><a href="/manager/delete/{{$food['id']}}" class="btn btn-secondary btn-xs">Delete</a></td>
      </tr
      <tr>
        <th>Suggested</th><td>:{{$food['suggested']}}</td><td><a href="/manager/suggest/{{$food['id']}}" class="btn btn-secondary btn-xs">Suggest</a></td>
      <tr>
        <th>Status</th><td>:{{$food['status']}}</td><td><a href="/manager/status/{{$food['id']}}" class="btn btn-secondary btn-xs">Change Status</a></td>
      </tr>
        <th>Ingredients</th><td>:{{$food['ingredients']}}</td><td><a href="/manager/ingredients/{{$food['id']}}" class="btn btn-secondary btn-xs">Edit Ingredients</a></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><h3><a href="/manager/Reviews/<%= userList[i].id %>" class="btn btn-secondary">Reviews</a></h3></td>
    </tr>
      </table>
      </fieldset>
      @endforeach
    </form>
</div>
</body>
</html>
