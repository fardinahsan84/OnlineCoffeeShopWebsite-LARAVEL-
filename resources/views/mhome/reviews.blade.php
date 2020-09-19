@extends('welcome')
<!DOCTYPE html>
<html>
<head>
	<title>Edit Coffee</title>
  <style>
    table.center {
          margin-left: auto;
          margin-right: auto;
        }
  			h3 {text-align: right;}
				h2{text-align:center;}
				ul {
				list-style-type: none;
				margin: 0;
				padding: 0;
				overflow: hidden;
				background-color: #333;
				}

				li {
				float: left;
				width: 12%;
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
      					<li><a href="/manager/newArrival">Balance sheet</a></li>
      					<li><a href="{{route('logout.index')}}">Logout</a><li>
      				</ul>
  <div class="p-3 mb-2 bg-primary text-white">
    <form name="ingredForm" onsubmit="return validateForm()" method="post" required>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
	<center>
				<h1>Customer Reviews!!</h1>
        <h2>{{$food['name']}}</h2>

			</center>

          <table class="center">
            <tr><td>

            <fieldset>
             <table class="center">
             <legend><h4>{{$food['name']}}</h4></legend>
            <tr>
             <th>ID</th><td>:{{$food['id']}}</td><td></td>
            </tr>
            <tr>
             <th>NAME</th><td>:{{$food['name']}}</td><td></td>
            </tr>
            <tr>
             <th>Price/item</th><td>:{{$food['price']}}</td>
            </tr
            <tr>
             <th>Suggested</th><td>:{{$food['suggested']}}</td>
            <tr>
             <th>Status</th><td>:{{$food['status']}}</td>
            </tr>
            <tr>
             <th>Ingredients</th><td>:{{$food['ingredients']}}</td>
            </tr>
            </table>
            </fieldset></td>
            <td><h4>Comment:</h4>
            @foreach($review as $cmnt)
            <table class="center">
              <tr>
                <th>{{$cmnt['username']}}</th>
                <td><input type="text" id="" name="cmt" value="{{$cmnt['comment']}}" readonly><br></td>
              </tr>
            </table>
            @endforeach
            </td></tr>
            </table>
            <table>
                  <tr>
                    <td><a href="{{route('manager.allFood')}}"  class="btn btn-secondary" >Back</a></td>
                  </tr>
              </table>
    </body>
  </html>
