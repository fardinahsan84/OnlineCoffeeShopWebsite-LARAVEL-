<!DOCTYPE html>
<html>
<head>
	<title>All Delivery man</title>

	</head>
	<body>
    <form  method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
	<h1>Delivery man list</h1>
	<table border="1" width="70%">
		<tr>
      <th>Delivery man Id</th>
			<th>Delivery man name</th>
			<th> Phone</th>
			<th> Email</th>
      <th> Address</th>
		</tr>

		@foreach($dlist as $key =>$rpt)
		<tr>
			<td>{{$rpt->c_id}}</td>
      <td>{{$rpt->name}}</td>
			<td>{{$rpt->phone}}</td>
      <th>{{$rpt->email}}</th>
      <th>{{$rpt->address}}</th>
    </tr>
		@endforeach
    <!-- <td rowspan="1" style="background-color:white;"></td> -->
	</table>
 </form>
</body>
</html>
