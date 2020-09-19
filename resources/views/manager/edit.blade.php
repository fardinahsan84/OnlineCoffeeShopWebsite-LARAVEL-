
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
    <form method="post" action="/manager/editProfile/{{$manager['id']}}" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <fieldset>
        <legend>Edit My profile</legend>
        <table class="center">
          <tr>
            <td>Name</td>
            <td>:{{$manager['name']}}</td>
          </tr>
          <tr>
            <td> ID </td>
            <td>:{{$manager['id']}}</td>
          </tr>
          <tr>
            <td> Salary </td>
            <td>:{{$manager['salary']}} tk</td>
          </tr>
          <tr>
            <td> User Type </td>
            <td>:{{$manager['userType']}}</td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input type="password" value="{{$manager['password']}}" required="required" name="password"  id="password"></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><input type="text" value="{{$manager['email']}}" required="required" name="email"  id="email"></td>
          </tr>
          <tr>
            <td>Phone no</td>
            <td><input type="text" value="{{$manager['phone']}}" required="required" name="phone"  id="phone"></td>
          </tr>
          <tr>
            <td>Address</td>
            <td><input type="text" value="{{$manager['address']}}" required="required" name="address"  id="address"></td>
          </tr>
          <tr>
            <td>Upload an image</td>
            <td><input type="file" value="{{$manager['image']}}" name="uploaded_image"  required="required" ></td>
          </tr>
          <tr><br>
          <td><br></td>
          </tr>
          <tr>
            <td></td>
            <td><button type="submit" name"choice" value="Update" class="btn btn-success">Update</button></td>
          </tr>
        </table>
    </fieldset>
  </form>
  <table>
      <tr>
        <td><a href="{{route('manager.index')}}" class="btn btn-secondary">Back</a></td>
      </tr>
  </table>
</div>
</body>
</html>
