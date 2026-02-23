<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Álbumes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table class="w-full text-left border-collapse">
                        <thead>
                        <tr class="border-b">
                            <th class="py-2 px-4">Portada</th>
                            <th class="py-2 px-4">Título</th>
                            <th class="py-2 px-4">Artista</th>
                            <th class="py-2 px-4">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($albums as $album)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-2 px-4">
                                    <img src="{{ asset('storage/' . $album->portada) }}" alt="{{ $album->titulo }}" width="200">
                                </td>
                                <td class="py-2 px-4">{{ $album->titulo }}</td>
                                <td class="py-2 px-4">{{ $album->artista }}</td>
                                <td class="py-2 px-4">
                                    <a href="{{ route('albums.show', $album->id) }}" class="text-indigo-600 hover:underline">Ver más</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
