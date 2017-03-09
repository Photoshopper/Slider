<?php

namespace Modules\Slider\Presenters;

interface SliderPresenterInterface
{
    /**
     * @param array $config
     * @param string $sliderName
     * @return string rendered slider
     */
    public function render($sliderName, $config);
}