<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravel 12 || Posts></title>
</head>
<body>

        <a href="/posts">Volver a posts </a>

    <h1>Titulo: {{$post -> title}}</h1>

    @if(true)
        <p>categoria: </p> {{$post -> category}}
        <p>contenido: </p>{{$post -> content}}
    @endif
</body>
</html>