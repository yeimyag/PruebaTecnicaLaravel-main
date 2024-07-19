<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Correo Tarea</title>
    </head>
    <body>
        <h1>{{$titulo}}</h1>
        <label>Descripcion</label>
        <p>{{$descripcion}}</p>
        <label>Fecha de vencimiento</label>
        <p>{{$fecha}}</p>
    </body>
</html>