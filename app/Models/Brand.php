<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;

class Brand extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    public $translatable = [
        'name',
    ];

    protected $guarded = [
        'id',
    ];


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('brands')
            ->useDisk('brands')
            ->singleFile();
    }


    public function addImage(UploadedFile $image)
    {
        $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
        $this->clearMediaCollection('brands');

        $this->addMedia($image)
            ->usingFileName($filename)
            ->toMediaCollection('brands');
    }
}
