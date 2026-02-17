<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\Album;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(StoreAlbumRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();

        Album::create($validated);

        return redirect()->route('albums.index')
            ->with('success', 'Álbum creado correctamente! :)');
    }

    public function show(Album $album)
    {
        return view('albums.show', compact('album'));
    }

    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'));
    }

    public function update(UpdateAlbumRequest $request, Album $album)
    {
        $album->update($request->validated());

        return redirect()->route('albums.index')
            ->with('success', 'Álbum actualizado correctamente! :)');
    }

    public function destroy(Album $album)
    {
        $album->delete();

        return redirect()->route('albums.index')
            ->with('success', 'Álbum eliminado correctamente!');
    }
}
