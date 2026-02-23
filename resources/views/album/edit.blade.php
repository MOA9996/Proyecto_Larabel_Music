<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Álbum') }}: {{ $album->titulo }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($errors->any())
                        <div class="mb-4 text-red-600">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('albums.update', $album->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="titulo" :value="__('Título')" />
                            <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo', $album->titulo)" required />
                        </div>

                        <div>
                            <x-input-label for="artista" :value="__('Artista')" />
                            <x-text-input id="artista" class="block mt-1 w-full" type="text" name="artista" :value="old('artista', $album->artista)" required />
                        </div>

                        <div>
                            <x-input-label for="anio" :value="__('Año')" />
                            <x-text-input id="anio" class="block mt-1 w-full" type="number" name="anio" :value="old('anio', $album->anio)" required />
                        </div>

                        <div>
                            <x-input-label for="genero" :value="__('Género')" />
                            <x-text-input id="genero" class="block mt-1 w-full" type="text" name="genero" :value="old('genero', $album->genero)" required />
                        </div>

                        <div>
                            <x-input-label for="discografica" :value="__('Discográfica')" />
                            <x-text-input id="discografica" class="block mt-1 w-full" type="text" name="discografica" :value="old('discografica', $album->discografica)" required />
                        </div>

                        <div>
                            <x-input-label for="numero_pistas" :value="__('Número de Pistas')" />
                            <x-text-input id="numero_pistas" class="block mt-1 w-full" type="number" name="numero_pistas" :value="old('numero_pistas', $album->numero_pistas)" required />
                        </div>

                        <div>
                            <x-input-label for="duracion_total" :value="__('Duración Total (minutos)')" />
                            <x-text-input id="duracion_total" class="block mt-1 w-full" type="number" name="duracion_total" :value="old('duracion_total', $album->duracion_total)" required />
                        </div>

                        <div>
                            <x-input-label for="formato" :value="__('Formato')" />
                            <x-text-input id="formato" class="block mt-1 w-full" type="text" name="formato" :value="old('formato', $album->formato)" required />
                        </div>

                        <div>
                            <x-input-label for="portada" :value="__('Portada (Imagen)')" />
                            @if ($album->portada)
                                <div class="mt-2 mb-2">
                                    <p class="text-sm text-gray-500 mb-1">Portada actual:</p>
                                    <img src="{{ asset('storage/' . $album->portada) }}" alt="{{ $album->titulo }}" width="150" class="rounded shadow">
                                </div>
                            @endif
                            <input id="portada" type="file" name="portada" accept="image/*" class="block mt-1 w-full text-sm text-gray-500" />
                            <p class="text-xs text-gray-400 mt-1">Deja vacío para conservar la portada actual.</p>
                        </div>

                        <div class="flex items-center gap-4 mt-4">
                            <x-primary-button>{{ __('Guardar cambios') }}</x-primary-button>
                            <a href="{{ route('albums.show', $album->id) }}" class="text-sm text-gray-600 hover:underline">Cancelar</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

