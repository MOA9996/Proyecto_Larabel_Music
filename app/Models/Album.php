<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
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
        'average_rating',
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

    public function updateAverageRating(): void
    {
        $average = $this->ratings()->avg('score');
        $this->update(['average_rating' => round($average ?? 0, 2)]);
    }
}
