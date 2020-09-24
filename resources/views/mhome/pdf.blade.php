<!DOCTYPE html>
<html>
<head>
	<title>Balance sheet</title>

	</head>
	<body>
    <form  method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
	<h1>Balance Sheet </h1>
  <h2>Report of September:</h2>
	<table border="1" width="70%">
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
      <th>{{$rpt->amount}}</th>
    </tr>
      @php($total += $rpt->amount)
      @php($count += 1)
      @if($count==count($report))
      <tr>
        <th colspan="3" >Total Amount</th>
        <th>{{$total}} Tk</th>
      </tr>
      @endif
		@endforeach
    <!-- <td rowspan="1" style="background-color:white;"></td> -->
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
 </form>
</body>
</html>
