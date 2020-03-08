<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    Hola estos son los movimientos:
@foreach($movimientos as $movimiento)
    {{ $movimiento->CIDDOCUMENTO }} <br>
@endforeach
</body>
</html>
