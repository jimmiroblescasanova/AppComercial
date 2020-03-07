<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
@foreach($documentos as $documento)
{{ $documento->CFECHA->format('d-m-Y') }}
@endforeach
</body>
</html>