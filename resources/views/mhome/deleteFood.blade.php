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
    <form method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">

        <fieldset>
            <legend>Delete Item</legend>
            <table class="center">
              <tr>
                <td>Item name: </td>
                <td>{{$food['name']}}</td>
              </tr>
              <tr>
                <td>Item id:</td>
                <td>{{$food['id']}}</td>
              </tr>
              <tr>
                <td>Item price:</td>
                <td>{{$food['price']}}</td>
              </tr>
              <tr>
                <td>Item status:</td>
                <td>{{$food['status']}}</td>
              </tr>
              <tr>
                <td>Ingredients</td>
                <td>{{$food['ingredients']}}</td>
              </tr>
              <tr>
                <td><h3>Are you sure to delete this item?</h3></td>
              </tr>
              <tr>
                <td><input type="hidden" name="id" value="{{$food['id']}}"></td>
                <td><input type="submit" name="choice" value="Confirm" class="btn btn-success"></td>
              </tr>
              </table>
            </fieldset>
            <table>
                <tr>
                  <td><a href="{{route('manager.allFood')}}"  class="btn btn-secondary" >Back</a></td>
                </tr>
            </table>
    </form>
  </div>
</body>
