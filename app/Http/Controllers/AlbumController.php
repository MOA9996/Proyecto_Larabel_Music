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

        Album::create($validated);

        return redirect()->route('albums.index')
            ->with('success', 'Álbum creado correctamente! :)');
    }

    public function show($id)
    {
        $album=Album::findOrFail($id);
        return view('albums.show', compact('album'));
    }

    public function edit($id)
    {
        $album=Album::findOrFail($id);
        return view('albums.edit', compact('album'));
    }

    public function update(UpdateAlbumRequest $request, Album $album)
    {
        $album->update($request->validated());

        return redirect()->route('albums.index')
            ->with('success', 'Álbum actualizado correctamente! :)');
    }

    public function destroy($id)
    {
        $album=Album::findOrFail($id);
        $album->delete();

        return redirect()->route('albums.index')
            ->with('success', 'Álbum eliminado correctamente!');
    }
}
