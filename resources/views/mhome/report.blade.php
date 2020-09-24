@extends('welcome')
<!DOCTYPE html>
<html>
<head>
	<title>Balance sheet</title>
  <style>
    table {
          width: 80%;
        }

        th {
          height: 50px;
          background-color: #4CAF50;
          color: white;
        }
        th, td {
          padding: 15px;
          text-align: left;
          color: black;
        }
        tr:nth-child(even) {background-color: #0FF;}
        tr:nth-child(odd) {background-color: #C0C0C0;}

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
      					<li><a href="{{route('manager.report')}}">Balance sheet</a></li>
      					<li><a href="{{route('logout.index')}}">Logout</a><li>
      				</ul>
  <div class="p-3 mb-2 bg-primary text-white">
    <form name="ingredForm" onsubmit="return validateForm()" method="post" required>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
	<center>
	<h1>Balance Sheet </h1>
  <h3><a href="{{ route('manager.pdfview') }}" class="btn btn-success">Download</a></h3>
	<table border="1">
		<tr>
      <th>Order Id</th>
			<th>Item name</th>
			<th>Quantity sale</th>
			<th>Amount(Tk)</th>

		</tr>
    @php($total=0)
    @php($i=1)
    @php($count=0)

		@foreach($report as $key =>$rpt)
		<tr>
			<td>{{$rpt->order_id}}</td>
      <td>{{$rpt->name}}</td>
			<td>{{$rpt->quantity}}</td>
      <td>{{$rpt->amount}}</td>
    </tr>
      @php($total += $rpt->amount)
      @php($count += 1)
      @if($count==count($report))
      <tr>
        <th colspan="3" style="text-align:right;">Total Amount</th>
        <th>{{$total}} Tk</th>
      </tr>
      @endif
		@endforeach
    <!-- <td rowspan="1" style="background-color:white;"></td> -->
    <tr>

    </tr>
	</table>
	<table>
		@php($ingred=3000)
		@php($profit=$total-$ingred)
		<tr>
		<th><pre>
			Total sale of this month = {{$total}} Tk<br>
			Total ingredients cost   ={{$ingred}} Tk<br>
			---------------------------------------<br>
			            Net profit   ={{$profit}} Tk<br></pre>
		</th>
	</tr>
	</table>
  </center>
 </form>
 <table >
       <tr class="p-3 mb-2 bg-primary text-white">
         <td><a href="{{route('manager.allFood')}}"  class="btn btn-secondary" >Back</a></td>
       </tr>
   </table>
</body>
</html>
