<?php

namespace Modules\Slider\Repositories\Cache;

use Modules\Slider\Repositories\SliderRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheSliderDecorator extends BaseCacheDecorator implements SliderRepository
{
    public function __construct(SliderRepository $slider)
    {
        parent::__construct();
        $this->entityName = 'slider.sliders';
        $this->repository = $slider;
    }
}
