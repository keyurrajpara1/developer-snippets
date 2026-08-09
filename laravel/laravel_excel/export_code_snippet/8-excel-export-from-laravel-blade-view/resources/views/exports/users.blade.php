<table>
	<thead>
		<tr>
			<th>#</th>
			<th>First name</th>
			<th>Email</th>
			<th>Phone number</th>
			<th>Address</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $key => $user)
			<tr>
				<td>{{ $key+1 }}</td>
				<td>{{ $user->first_name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->phone_number }}</td>
				<td>{{ $user->address }}</td>
			</tr>
		@endforeach
	</tbody>
</table>