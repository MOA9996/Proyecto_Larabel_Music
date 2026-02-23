<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $album->titulo }}
        </h2>
    </x-slot>

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

                    {{-- Valoración --}}
                    <div class="border-t border-gray-200 pt-4 mt-4">
                        <p class="font-semibold text-gray-700 mb-2">Valoración media:
                            <span class="text-fuchsia-700">
                                {{ $album->promedio ? number_format($album->promedio, 1) . ' / 5' : 'Sin valoraciones aún' }}
                            </span>
                        </p>

                        @auth
                            <form action="{{ route('ratings.store', $album->id) }}" method="POST" class="flex items-center gap-3">
                                @csrf
                                <label class="text-sm font-medium text-gray-700">Tu puntuación:</label>
                                <select name="score" class="border-fuchsia-300 focus:border-fuchsia-500 focus:ring-fuchsia-500 rounded-md text-sm">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <x-primary-button>Valorar</x-primary-button>
                            </form>

                            @if(session('success'))
                                <p class="mt-2 text-sm text-green-600">{{ session('success') }}</p>
                            @endif
                        @else
                            <p class="text-sm text-gray-500">
                                <a href="{{ route('login') }}" class="text-fuchsia-600 hover:underline">Inicia sesión</a> para valorar este álbum.
                            </p>
                        @endauth
                    </div>

                    <div class="flex items-center gap-4 mt-6">
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
