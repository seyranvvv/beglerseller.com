<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;

class Section extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    public $translatable = [
        'name',
        'description',
    ];

    protected $fillable = [
        'slug',
        'name',
        'description',
        'primary_color',
        'base_color',
        'secondary_color',
    ];


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logos')
            ->useDisk('logos')
            ->singleFile();
    }


    public function addImage(UploadedFile $image)
    {
        $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();

        $this->addMedia($image)
            ->usingFileName($filename)
            ->toMediaCollection('logos');
    }

    // relations

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function sliders()
    {
        return $this->hasMany(Slider::class);
    }


    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function abouts()
    {
        return $this->hasMany(About::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function banners()
    {
        return $this->hasMany(Banner::class);
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
