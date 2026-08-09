<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
@if(session('status'))
	{{ session('status') }}
@endif
@if(isset($errors) && $errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
@if (session()->has('failures'))
    <table>
        <tr>
            <th>Row</th>
            <th>Attribute</th>
            <th>Errors</th>
            <th>Value</th>
        </tr>
        @foreach (session()->get('failures') as $validation)
            <tr>
                <td>{{ $validation->row() }}</td>
                <td>{{ $validation->attribute() }}</td>
                <td>
                    <ul>
                        @foreach ($validation->errors() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    {{ $validation->values()[$validation->attribute()] }}
                </td>
            </tr>
        @endforeach
    </table>
@endif
<form action="{{ route('import-submit') }}" method="post" enctype="multipart/form-data">
	@csrf
	<input type="file" name="file">
	<button type="submit">Import</button>
</form>
</body>
</html>