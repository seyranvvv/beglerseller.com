<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;

class Product extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    public $translatable = [
        'title',
        'content',
    ];

    protected $guarded = [
        'id',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('products')
            ->useDisk('products')
            ->singleFile();

        $this->addMediaCollection('products_2')
            ->useDisk('products_2')
            ->singleFile();


        $this->addMediaCollection('products_3')
            ->useDisk('products_3')
            ->singleFile();


        $this->addMediaCollection('products_4')
            ->useDisk('products_4')
            ->singleFile();


        $this->addMediaCollection('products_5')
            ->useDisk('products_5')
            ->singleFile();
    }


    public function addImage(UploadedFile $image, $index)
    {
        if ($index != 1) {
            $p = 'products_' . $index;
        } else {
            $p = 'products';
        }
        $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
        $this->clearMediaCollection($p);

        $this->addMedia($image)
            ->usingFileName($filename)
            ->toMediaCollection($p);
    }

    public function isFavorite(): bool
    {
        $client = auth()->guard('client')->user();
        if (!$client)
            return false;

        $isFavorite = \DB::table('favorites')
            ->where('client_id', $client->id)
            ->where('product_id', $this->id)
            ->exists();

        return $isFavorite;
    }
}
