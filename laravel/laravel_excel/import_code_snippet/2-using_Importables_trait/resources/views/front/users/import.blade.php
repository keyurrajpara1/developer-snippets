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
<form action="{{ route('import-submit') }}" method="post" enctype="multipart/form-data">
	@csrf
	<input type="file" name="file">
	<button type="submit">Import</button>
</form>
</body>
</html>