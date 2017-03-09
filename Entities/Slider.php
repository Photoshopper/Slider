<?php

namespace Modules\Slider\Entities;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider__sliders';
    protected $fillable = [
        'name',
        'system_name',
        'width',
        'height'
    ];

    public function slides()
    {
        return $this->hasMany('Modules\Slider\Entities\Slide')->where('published', 1)->orderBy('weight');
    }

    public function allSlides()
    {
        return $this->hasMany('Modules\Slider\Entities\Slide')->orderBy('weight');
    }
}
