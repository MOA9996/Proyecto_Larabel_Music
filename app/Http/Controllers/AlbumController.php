<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\Album;
use Illuminate\Support\Facades\Storage;


class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('album.index', compact('albums'));
    }

    public function create()
    {
        return view('album.create');
    }

    public function store(StoreAlbumRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();

        if ($request->hasFile('portada')) {
            $validated['portada'] = $request->file('portada')
                ->store('portadas', 'public');
        } else {
            $validated['portada'] = 'portadas/default.jpg';
        }

        Album::create($validated);

        return redirect()->route('albums.index')
            ->with('success', 'Álbum creado correctamente! :)');
    }

    public function show($id)
    {
        $album = Album::findOrFail($id);
        return view('album.show', compact('album'));
    }

    public function edit($id)
    {
        $album = Album::findOrFail($id);
        return view('album.edit', compact('album'));
    }

    public function update(UpdateAlbumRequest $request, Album $album)
    {
        $validated = $request->validated();

        if ($request->hasFile('portada')) {
            // Eliminar imagen antigua si no es la por defecto
            if ($album->portada && $album->portada !== 'portadas/default.jpg') {
                Storage::disk('public')->delete($album->portada);
            }

            $validated['portada'] = $request->file('portada')
                ->store('portadas', 'public');
        }

        $album->update($validated);

        return redirect()->route('albums.index')
            ->with('success', 'Álbum actualizado correctamente! :)');
    }

    public function destroy($id)
    {
        $album = Album::findOrFail($id);

        // Eliminar imagen si no es la por defecto
        if ($album->portada && $album->portada !== 'portadas/default.jpg') {
            Storage::disk('public')->delete($album->portada);
        }

        $album->delete();

        return redirect()->route('albums.index')
            ->with('success', 'Álbum eliminado correctamente!');
    }
}
