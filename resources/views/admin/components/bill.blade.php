@if($bill)
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>ID_BILL</th>
				<th>NAME PRODUCE</th>
				<th>QTY</th>
				<th>PRICE</th>
			</tr>
		</thead>
		<tbody>
			@foreach($bill as $key =>$b)
			<tr>
				<td>{{$b->id}}</td>
				<td>{{$b->id_bills}}</td>
				<td><a href="" target="_blank">{{isset($b->produce->name)?$o->produce->name:''}}</a></td>
				<td>{{$b->quantity}}</td>
				<td>{{number_format($b->price,0,',',',')}} VND</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endif