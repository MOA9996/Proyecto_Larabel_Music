@extends('layout.layout')

@section('title', 'Detalle del Album')

@section('content')
    <h1>{{ $album->titulo }}</h1>

    <p><strong>Artista:</strong> {{ $album->artista }}</p>
    <p><strong>Año:</strong> {{ $album->anio }}</p>
    <p><strong>Género:</strong> {{ $album->genero }}</p>
    <p><strong>Discográfica:</strong> {{ $album->discografica }}</p>
    <p><strong>Numero de pistas:</strong> {{ $album->numero_pistas}}</p>
    <p><strong>Duracion Total (minutos): {{$album->duracion_total}}</strong></p>
    <p><strong>Formato:{{$album->formato}}</strong></p>
    <p><strong>Portada:<img src="{{ asset('storage/' . $album->portada) }}" alt="{{ $album->titulo }}" width="200"></strong></p>
    <br>

    <a href="{{ route('albums.index') }}" class="btn">← Volver</a>
    <a href="{{ route('albums.edit', $album->id) }}" class="btn">Editar</a>
@endsection
