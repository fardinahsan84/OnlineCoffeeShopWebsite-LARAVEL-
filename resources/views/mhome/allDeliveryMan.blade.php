
@extends('welcome')
<!DOCTYPE html>
<html>
<head>
	<title>All Delivery man </title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <style>
    table.center {
          margin-left: auto;
          margin-right: auto;
        }
  			h3 {text-align: left;}
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
      <h1>All Delivery man list</h1>
      <h2>Manager: {{ Session::get('username')}}</h2>

		 <input type="text" name="search" id="search" placeholder="Search Customer" />
		 </center>
        <table class="center" border="2" width="70%">

					<tbody>

					</tbody>
      </table>
			<h3><a href="{{route('manager.index')}}" class="btn btn-secondary btn-xs" >Back</a></h3>
    </form>
</div>
</body>
</html>

<script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('manager.DeliverySearch') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>
