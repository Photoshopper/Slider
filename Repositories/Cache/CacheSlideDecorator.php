<?php

namespace Modules\Slider\Repositories\Cache;

use Modules\Slider\Repositories\SlideRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheSlideDecorator extends BaseCacheDecorator implements SlideRepository
{
    public function __construct(SlideRepository $slide)
    {
        parent::__construct();
        $this->entityName = 'slider.slides';
        $this->repository = $slide;
    }
}
