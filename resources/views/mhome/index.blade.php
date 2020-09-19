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
				img {
  			border-radius: 50%;
			  }
				</style>

				</head>
				<body>
				<ul>
					<li><a href="{{route('manager.index')}}">Home</a></li>
					<li><a href="{{route('manager.editProfile',$manager['id'])}}">Edit Profile</a></li>
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
	<center>
		<br>
		<br>
					<h1>Welcome Home! {{ Session::get('username')}}</h1>
					<h2>My Profile</h2>
</center>

	<fieldset>

		<table class="center">
			<tr>
				<td><img alt="User Pic" src="http://localhost:8000/images/upload_images/{{$manager['image']}}" width="240" height="240" ></td>
				<td><pre>
	 ID	 : {{$manager['id']}}<br>
	 Name	 : {{$manager['name']}}<br>
	 Gender  : {{$manager['gender']}}<br>
	 Phone   : {{$manager['phone']}}<br>
	 Address : {{$manager['address']}}<br>
	 Email   : {{$manager['email']}}<br></pre></td>
			</tr>
		</table>
	</fieldset>
</form>
</div>
</body>
</html>


© 2020 GitHub, Inc.
