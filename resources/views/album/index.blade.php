<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Listado Albums</h1>
<table>
    <thead>
    <tr>
        <th>Portada</th>
        <th>Título</th>
        <th>Artista</th>

    </tr>
    </thead>
    <tbody>
    @foreach($albums as $album)
        <tr>
           <td><img src="{{ asset('storage/' . $album->portada) }}" alt="{{ $album->titulo }}" width="200"></td>
            <td>{{ $album->titulo }}</td>
            <td>{{ $album->artista }}</td>
            <td><a href="{{route('albums.show',$album->id)}}">Ver más</a> </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
