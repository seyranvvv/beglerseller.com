<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;

class Post extends Model implements HasMedia
{


    use HasTranslations, InteractsWithMedia;

    public $translatable = [
        'title',
        'content',
    ];

    protected $fillable = [
        'title',
        'content',
        'datetime',

    ];



    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('posts')
            ->useDisk('posts')
            ->singleFile();
    }
    

    public function addImage(UploadedFile $image)
    {
        $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
        $this->clearMediaCollection('posts');

        $this->addMedia($image)
            ->usingFileName($filename)
            ->toMediaCollection('posts');
    }


    public function monthName($id)
    {
        switch ($id) {
            case 1:
                return "Ýanwar";
            case 2:
                return "Fewral";
            case 3:
                return "Mart";
            case 4:
                return "Aprel";
            case 5:
                return "Maý";
            case 6:
                return "Iýun";
            case 7:
                return "Iýul";
            case 8:
                return "Awgust";
            case 9:
                return "Sentýabr";
            case 10:
                return "Oktýabr";
            case 11:
                return "Noýabr";
            case 12:
                return "Dekabr";
        }
    }


    public function publishedAt()
    {
        $now = Carbon::now();
        $datetime = Carbon::parse($this->datetime);
        $lenghtSeconds = $datetime->diffInSeconds($now);
        $lengthMinutes = $datetime->diffInMinutes($now);
        $lenghtHours = $datetime->diffInHours($now);
        $lengthDay = $datetime->diffInDays($now);
        $lenghtMonths = $datetime->diffInMonths($now);


        if ($lengthDay > 3) {
            return Carbon::parse($this->datetime)->format('d.m.Y');
        } else {
            if ($lengthMinutes < 5) {
                return trans('translation.now');
            }
            $publishedAt = $datetime->diffForHumans();
            $publishedAt = str_replace(['s'], ' ', $publishedAt);
            $publishedAt = str_replace(['seconds', 'second'], trans_choice('translation.second', $lenghtSeconds), $publishedAt);
            $publishedAt = str_replace(['minutes', 'minute'], trans_choice('translation.minute', $lengthMinutes), $publishedAt);
            $publishedAt = str_replace(['hours', 'hour'], trans_choice('translation.hour', $lenghtHours), $publishedAt);
            $publishedAt = str_replace(['day', 'days'], trans_choice('translation.day', $lengthDay), $publishedAt);
            $publishedAt = str_replace(['months', 'month'], trans_choice('translation.month', $lenghtMonths), $publishedAt);
            $publishedAt = str_replace(['ago'], trans('translation.ago'), $publishedAt);
            $publishedAt = str_replace(['from now'], trans('translation.from_now'), $publishedAt);

            if (preg_match('(years|year)', $publishedAt)) {
                $publishedAt = $datetime->toFormattedDateString();
            }
            return $publishedAt;
        }
    }
}
