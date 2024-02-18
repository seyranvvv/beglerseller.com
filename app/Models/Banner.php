<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Banner extends Model implements HasMedia
{
    use  InteractsWithMedia;



    protected $fillable = [
        'banner_type_id'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function type()
    {
        return $this->belongsTo(BannerType::class, 'banner_type_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('banners')
            ->useDisk('banners')
            ->singleFile();
    }


    public function addImage(UploadedFile $image)
    {
        $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();

        $this->addMedia($image)
            ->usingFileName($filename)
            ->toMediaCollection('banners');
    }
}
