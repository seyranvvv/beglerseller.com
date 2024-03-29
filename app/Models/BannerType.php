<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class BannerType extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $fillable = [
        'slug',
        'name',
    ];

    public function banners()
    {
        return $this->hasMany(Banner::class);
    }
}
