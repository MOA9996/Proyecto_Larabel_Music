<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $album->titulo }}
        </h2>
    </x-slot>

    <style>
        .estrellas input { display: none; }

        .estrellas label {
            font-size: 2rem;
            color: #d1d5db;
            cursor: pointer;
            transition: color 0.2s;
        }

        .estrellas input:checked ~ label,
        .estrellas label:hover,
        .estrellas label:hover ~ label {
            color: #a21caf;
        }

        .estrellas {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
        }

        .estrellas label:hover,
        .estrellas label:hover ~ label,
        .estrellas input:checked ~ label {
            color: #a21caf;
        }

        .estrella-display {
            font-size: 1.5rem;
            color: #d1d5db;
        }

        .estrella-display.activa {
            color: #a21caf;
        }
    </style>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-3">

                    <p><strong>Artista:</strong> {{ $album->artista }}</p>
                    <p><strong>Año:</strong> {{ $album->anio }}</p>
                    <p><strong>Género:</strong> {{ $album->genero }}</p>
                    <p><strong>Discográfica:</strong> {{ $album->discografica }}</p>
                    <p><strong>Número de pistas:</strong> {{ $album->numero_pistas }}</p>
                    <p><strong>Duración total (minutos):</strong> {{ $album->duracion_total }}</p>
                    <p><strong>Formato:</strong> {{ $album->formato }}</p>

                    <div>
                        <strong>Portada:</strong><br>
                        <img src="{{ asset('storage/' . $album->portada) }}" alt="{{ $album->titulo }}" width="200" class="mt-2 rounded shadow">
                    </div>

                    {{-- SISTEMA DE VALORACIÓN --}}
                    <div class="border-t border-fuchsia-200 pt-4 mt-4 space-y-3">

                        {{-- Promedio general con estrellas visuales --}}
                        <div>
                            <p class="font-semibold text-gray-700 mb-1">Valoración media:</p>
                            <div class="flex items-center gap-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="estrella-display {{ $i <= round($album->average_rating) ? 'activa' : '' }}">★</span>
                                @endfor
                                <span class="text-fuchsia-700 font-bold text-lg">
                                    {{ $album->average_rating ? number_format($album->average_rating, 1) . ' / 5' : 'Sin valoraciones' }}
                                </span>
                            </div>
                            {{-- Número total de valoraciones --}}
                            <p class="text-sm text-gray-500 mt-1">
                                {{ $album->ratings()->count() }} valoración(es)
                            </p>
                        </div>

                        {{-- Formulario de estrellas clicables --}}
                        @auth
                            @php
                                $miValoracion = $album->ratings()->where('user_id', auth()->id())->first();
                            @endphp

                            {{-- Valoración actual del usuario --}}
                            @if($miValoracion)
                                <p class="text-sm text-fuchsia-700">
                                    Tu valoración actual:
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span style="color: {{ $i <= $miValoracion->score ? '#a21caf' : '#d1d5db' }}">★</span>
                                    @endfor
                                    ({{ $miValoracion->score }}/5)
                                </p>
                            @endif

                            <form action="{{ route('ratings.store', $album->id) }}" method="POST">
                                @csrf
                                <p class="text-sm font-medium text-gray-700 mb-1">
                                    {{ $miValoracion ? 'Cambiar tu valoración:' : 'Valora este álbum:' }}
                                </p>
                                <div class="estrellas">
                                    @for ($i = 5; $i >= 1; $i--)
                                        <input type="radio" name="score" id="star{{ $i }}" value="{{ $i }}"
                                            {{ isset($miValoracion) && $miValoracion->score == $i ? 'checked' : '' }}>
                                        <label for="star{{ $i }}" title="{{ $i }} estrella(s)">★</label>
                                    @endfor
                                </div>
                                <x-primary-button class="mt-3">
                                    {{ $miValoracion ? 'Actualizar valoración' : 'Enviar valoración' }}
                                </x-primary-button>
                            </form>

                            {{-- Feedback de éxito --}}
                            @if(session('success'))
                                <p class="text-sm text-green-600 font-medium">✓ {{ session('success') }}</p>
                            @endif

                        @else
                            <p class="text-sm text-gray-500">
                                <a href="{{ route('login') }}" class="text-fuchsia-600 hover:underline font-medium">Inicia sesión</a> para valorar este álbum.
                            </p>
                        @endauth
                    </div>

                    <div class="flex items-center gap-4 mt-6 border-t border-fuchsia-200 pt-4">
                        <a href="{{ route('albums.index') }}" class="text-sm text-gray-600 hover:underline">← Volver</a>
                        <a href="{{ route('albums.edit', $album->id) }}" class="inline-flex items-center px-4 py-2 bg-fuchsia-700 text-white text-sm font-medium rounded-md hover:bg-fuchsia-600">
                            Editar
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
