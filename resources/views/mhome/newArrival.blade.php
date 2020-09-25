@extends('welcome')
<!DOCTYPE html>
<html>
<head>
	<title>New Arrival</title>
  <style>
  table.center {
        margin-left: auto;
        margin-right: auto;
      }
			h3 {text-align: right;}
      p {
            font-size: 30px;
        }

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
	<center>
				<h1>New Arrival !!!</h1>
			</center>

            <table >
              <tr>
    		@for($i=count($foodList)-1; $i >= 8; $i--)
          <td>
      				 <fieldset >
      					<table class="center">
      					<legend><p>{{$foodList[$i]['name']}}</p></legend>
      				<tr>
          			<th>NAME</th><td>:{{$foodList[$i]['name']}}</td>
								<td><h3><a href="/manager/reviews/{{$foodList[$i]['id']}}" class="btn btn-secondary">Reviews</a></h3></td>
      				</tr>
      				<tr>
                <th>Price/item</th><td>:{{$foodList[$i]['price']}}</td><br>
      				</tr
      				<tr>
                <th>Item status</th><td>:{{$foodList[$i]['status']}}</td>
                </tr>
              <tr>
          			<th>Ingredients</th><td>:{{$foodList[$i]['ingredients']}}</td>
          		</tr>
      				</table>
      				</fieldset>
          </td>
    		@endfor
      </tr>
  </table>
	<table>
		<br><br>
			<tr>
				<td><a href="{{route('manager.allFood')}}"  class="btn btn-secondary" >Back</a></td>
			</tr>
	</table>
</body>
</html>
