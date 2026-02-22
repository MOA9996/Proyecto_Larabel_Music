@extends('layout.layout')

@section('title', 'Crear Álbum')

@section('content')
    <h1>Agregar Nuevo Álbum</h1>

    <form action="{{ route('albums.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div style="color:red">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <label>Título:</label><br>
        <input type="text" name="titulo" required><br><br>

        <label>Artista:</label><br>
        <input type="text" name="artista" required><br><br>

        <label>Año:</label><br>
        <input type="number" name="anio" required><br><br>

        <label>Género:</label><br>
        <input type="text" name="genero" required><br><br>

        <label>Discográfica:</label><br>
        <input type="text" name="discografica" required><br><br>

        <label>Número de Pistas:</label><br>
        <input type="number" name="numero_pistas" required><br><br>

        <label>Duración Total (minutos):</label><br>
        <input type="number" name="duracion_total" required><br><br>

        <label>Formato:</label><br>
        <input type="text" name="formato" required><br><br>

        <label>Portada (Imagen):</label><br>
        <input type="file" name="portada" accept="image/*"><br><br>

        <button type="submit">Guardar</button>
        <a href="{{ route('albums.index') }}">Cancelar</a>
    </form>
@endsection
