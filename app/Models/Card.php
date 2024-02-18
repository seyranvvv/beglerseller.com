<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Card extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    public $translatable = [
        'name',
        'body',
        'counter_text',
    ];

    protected $fillable = [
        'name',
        'body',
        'counter_text',
        'counter_number',
        'card_type_id',

    ];
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function type()
    {
        return $this->belongsTo(CardType::class, 'card_type_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('icon')
            ->useDisk('icon')
            ->singleFile();
    }


    public function addImage(UploadedFile $image)
    {
        $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();

        $this->addMedia($image)
            ->usingFileName($filename)
            ->toMediaCollection('icon');
    }
}
