<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAlbumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Obtener el álbum desde la ruta
        $album = $this->route('album');

        // Solo el propietario puede actualizar
        return auth()->check() && auth()->id() === $album->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255',
            'artista' => 'required|string|max:255',
            'discografica' => 'required|string|max:255',
            'numero_pistas' => 'required|integer|min:1',
            'duracion_total' => 'required|integer|min:1',
            'anio' => 'required|integer|min:1900|max:' . date('Y'),
            'genero' => 'required|string|max:100',
            'formato' => 'required|in:CD,Vinilo,Digital,Cassette',
            'portada' => 'nullable|url|max:500',
        ];
    }

    /**
     * Mensajes de error personalizados
     */
    public function messages(): array
    {
        return [
            'titulo.required' => 'El título del álbum es obligatorio.',
            'titulo.max' => 'El título no puede tener más de 255 caracteres.',

            'artista.required' => 'El nombre del artista es obligatorio.',
            'artista.max' => 'El nombre del artista no puede tener más de 255 caracteres.',

            'discografica.required' => 'La discográfica es obligatoria.',
            'discografica.max' => 'La discográfica no puede tener más de 255 caracteres.',

            'numero_pistas.required' => 'El número de pistas es obligatorio.',
            'numero_pistas.integer' => 'El número de pistas debe ser un número entero.',
            'numero_pistas.min' => 'Debe haber al menos 1 pista.',

            'duracion_total.required' => 'La duración total es obligatoria.',
            'duracion_total.integer' => 'La duración debe ser un número entero.',
            'duracion_total.min' => 'La duración debe ser mayor a 0 minutos.',

            'anio.required' => 'El año de lanzamiento es obligatorio.',
            'anio.integer' => 'El año debe ser un número entero.',
            'anio.min' => 'El año debe ser 1900 o posterior.',
            'anio.max' => 'El año no puede ser futuro.',

            'genero.required' => 'El género musical es obligatorio.',
            'genero.max' => 'El género no puede tener más de 100 caracteres.',

            'formato.required' => 'El formato es obligatorio.',
            'formato.in' => 'El formato debe ser: CD, Vinilo, Digital o Cassette.',

            'portada.url' => 'La portada debe ser una URL válida.',
            'portada.max' => 'La URL de la portada es demasiado larga.',
        ];
    }

    /**
     * Nombres personalizados de atributos
     */
    public function attributes(): array
    {
        return [
            'titulo' => 'título',
            'numero_pistas' => 'número de pistas',
            'duracion_total' => 'duración total',
            'anio' => 'año',
            'genero' => 'género',
        ];
    }
}
