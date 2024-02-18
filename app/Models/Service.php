<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;


class Service extends Model implements HasMedia
{

    use HasTranslations, InteractsWithMedia;

    public $translatable = [
        'title',
        'content',
    ];

    protected $fillable = [
        'title',
        'content',
        'order',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('services')
            ->useDisk('services')
            ->singleFile();

        $this->addMediaCollection('icon')
            ->useDisk('icon')
            ->singleFile();
    }


    public function addImage(UploadedFile $image)
    {
        $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
        $this->clearMediaCollection('services');

        $this->addMedia($image)
            ->usingFileName($filename)
            ->toMediaCollection('services');
    }

    public function addIcon(UploadedFile $image)
    {
        $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
        $this->clearMediaCollection('icon');

        $this->addMedia($image)
            ->usingFileName($filename)
            ->toMediaCollection('icon');
    }
}
