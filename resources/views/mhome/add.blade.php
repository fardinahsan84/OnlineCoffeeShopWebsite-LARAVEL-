
@extends('welcome')

<!DOCTYPE html>
<html>
<head>
	<title>Edit profile</title>
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
				width: 11%;
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
					<li><a href="/manager/allDeliveryMan">Delivery man</a></li>
					<li><a href="/manager/newArrival">New Arrival</a></li>
					<li><a href="/manager/newArrival">Reviews</a></li>
					<li><a href="/manager/newArrival">Balance sheet</a></li>
					<li><a href="{{route('logout.index')}}">Logout</a><li>
				</ul>
<div class="p-3 mb-2 bg-primary text-white">
    <form method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
            <legend>Add Coffee Item</legend>
            <table class="center">
              <tr>
                <td>Item name</td>
                <td><input type="text" name="name" ><span style="color:red;">{{$errors->first('name')}}</span></td>

              </tr>
              <tr>
                <td>Item price</td>
                <td><input type="text" name="price" ><span style="color:red;">{{$errors->first('price')}}</span></td>

              </tr>
              <tr>
                <td>Ingredients</td>
                <td><input type="text" name="ingredients" ><span style="color:red;">{{$errors->first('ingredients')}}</span></td>

              </tr>

              <tr>
                <td>Item status</td>
                <td>  <input type="radio" id="available" name="status" value="available" checked="checked">
                      <label for="available" >Available</label><br>
                      <input type="radio" id="notAvailable" name="status" value="not available" >
                      <label for="notAvailable">Not Available</label><br>
                </td>
              </tr>

              <tr>
                <td></td>
                <td><button type="submit" name"choice" value="Insert" class="btn btn-success">Insert</button></td>
              </tr>
            </table>
      <table>
          <tr>
            <td><a href="{{route('manager.index')}}"  class="btn btn-secondary" >Back</a></td>
          </tr>
      </table>
    </form>
    </div>
  </body>
  </html>
