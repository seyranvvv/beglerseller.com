<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;

class Slider extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    protected $fillable = [
        'url',
        'title',
        'body',
        'status',
    ];


    public $translatable = [
        'title',
        'body',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('slider_fr')
            ->useDisk('slider_fr')
            ->singleFile();

        $this->addMediaCollection('slider_ru')
            ->useDisk('slider_ru')
            ->singleFile();

        $this->addMediaCollection('slider_en')
            ->useDisk('slider_en')
            ->singleFile();
    }

    public function addImageTm(UploadedFile $image): void
    {
        $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
        $this->clearMediaCollection('slider_fr');

        $this->addMedia($image)
            ->usingFileName($filename)
            ->toMediaCollection('slider_fr');
    }


    public function addImageEn(UploadedFile $image): void
    {
        $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
        $this->clearMediaCollection('slider_en');

        $this->addMedia($image)
            ->usingFileName($filename)
            ->toMediaCollection('slider_en');
    }


    public function addImageRu(UploadedFile $image): void
    {
        $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
        $this->clearMediaCollection('slider_ru');

        $this->addMedia($image)
            ->usingFileName($filename)
            ->toMediaCollection('slider_ru');
    }
}
