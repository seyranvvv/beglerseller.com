<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;

class About extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    public $translatable = [
        'title',
        'content',
        'years_text',
    ];

    protected $fillable = [
        'title',
        'content',
        'years_text',
        'years_number',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('about')
            ->useDisk('about')
            ->singleFile();

        $this->addMediaCollection('about2')
            ->useDisk('about2')
            ->singleFile();
    }


    public function addImage(UploadedFile $image)
    {
        $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
        $this->clearMediaCollection('about');

        $this->addMedia($image)
            ->usingFileName($filename)
            ->toMediaCollection('about');
    }

    public function addImage2(UploadedFile $image)
    {
        $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
        $this->clearMediaCollection('about2');

        $this->addMedia($image)
            ->usingFileName($filename)
            ->toMediaCollection('about2');
    }
}
