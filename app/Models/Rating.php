<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable=[
      'user_id',
      'album_id',
        'score',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function album()
    {
        return $this->belongsTo(Album::class);
    }
    protected static function validacionScore()
    {
        parent::validacionScore();

        static::saving(function ($rating) {
            if ($rating->score < 1 || $rating->score > 5) {
                throw new \InvalidArgumentException('El score debe estar entre 1 y 5.');
            }
        });
    }


}
