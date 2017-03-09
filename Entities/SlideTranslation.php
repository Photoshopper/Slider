<?php

namespace Modules\Slider\Entities;

use Illuminate\Database\Eloquent\Model;

class SlideTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'text',
        'uri',
        'url'
    ];
    protected $table = 'slider__slide_translations';
}
