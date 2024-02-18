<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CardType extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $fillable = [
        'slug',
        'name',
    ];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
