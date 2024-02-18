<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\UploadedFile;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{

    use HasTranslations, InteractsWithMedia;

    public $translatable = [
        'name',
    ];

    protected $fillable = [
        'name',
        'order',
        'parent_category_id',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    public function parentCategory()
    {
        return $this->belongsTo(ParentCategory::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('categories')
            ->useDisk('categories')
            ->singleFile();
    }


    public function addImage(UploadedFile $image)
    {
        $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
        $this->clearMediaCollection('categories');

        $this->addMedia($image)
            ->usingFileName($filename)
            ->toMediaCollection('categories');
    }
}
