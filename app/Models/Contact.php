<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Contact extends Model
{

    use HasTranslations;

    public $translatable = ['address', 'slogan'];

    protected $guarded = [
        'id',
    ];



    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
