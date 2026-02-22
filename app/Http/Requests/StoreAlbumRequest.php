<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlbumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo'        => 'required|string|max:225',
            'artista'       => 'required|string|max:225',
            'discografica'  => 'required|string|max:225',
            'numero_pistas' => 'required|integer|min:1|max:999',
            'duracion_total'=> 'required|integer|min:1|max:999',
            'anio'          => 'required|integer|min:1900|max:' . date('Y'),
            'genero'        => 'required|string|max:100',
            'formato'       => 'required|string|max:50',
            'portada'       => 'nullable|url|max:500',
        ];
    }
    public function messages(): array
    {
        return [
            'titulo.required' => 'El título del álbum es obligatorio',
            'titulo.max' => 'El título no puede tener más de 255 caracteres',

            'artista.required' => 'El nombre del artista es obligatorio',
            'artista.max' => 'El nombre del artista no puede tener más de 255 caracteres',

            'discografica.required' => 'La discográfica es obligatoria',
            'discografica.max' => 'La discográfica no puede tener más de 255 caracteres',

            'numero_pistas.required' => 'El número de pistas es obligatorio',
            'numero_pistas.integer' => 'El número de pistas debe ser un número entero',
            'numero_pistas.min' => 'Debe haber al menos 1 pista',

            'duracion_total.required' => 'La duración total es obligatoria',
            'duracion_total.integer' => 'La duración debe ser un número entero',
            'duracion_total.min' => 'La duración debe ser mayor a 0 minutos',

            'anio.required' => 'El año de lanzamiento es obligatorio',
            'anio.integer' => 'El año debe ser un número entero',
            'anio.min' => 'El año debe ser 1900 o posterior',
            'anio.max' => 'El año no puede ser futuro',

            'genero.required' => 'El género musical es obligatorio',
            'genero.max' => 'El género no puede tener más de 100 caracteres',

            'formato.required' => 'El formato es obligatorio',
            'formato.max' => 'El formato no puede tener más de 50 caracteres',

            'portada.url' => 'La portada debe ser una URL válida',
            'portada.max' => 'La URL de la portada es demasiado larga',
        ];
    }
}
