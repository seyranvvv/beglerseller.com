<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ParentCategory extends Model
{
    use HasTranslations;


    public $translatable = [
        'name',
    ];

    protected $fillable = [
        'name',
        'order'
    ];


    public function categories()
    {
        return $this->hasMany(Category::class)->orderBy('order', 'asc');
    }
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
