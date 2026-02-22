<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    // Laravel detecta automáticamente que la tabla es 'albums'
    // No necesitas definir $table a menos que uses un nombre personalizado
    use HasFactory;
    protected $fillable = [
        'titulo',
        'artista',
        'anio',
        'genero',
        'discografica',
        'numero_pistas',
        'duracion_total',
        'formato',
        'portada',
        'user_id',
    ];

    protected $casts = [
        'anio' => 'integer',
        'numero_pistas' => 'integer',
        'duracion_total' => 'integer',
        'average_rating' => 'decimal:2',
    ];




    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


    public function updateAverageRating()
    {
        $average = $this->ratings()->avg('score');

        // En caso de no haber ratings, se dejaría en 0 el average
        $this->average_rating = $average ?? 0;

        $this->save();
    }
}
