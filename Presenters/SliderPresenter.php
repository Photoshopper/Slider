<?php

namespace Modules\Slider\Presenters;

use Illuminate\Support\Facades\View;
use Modules\Slider\Entities\Slider;

class SliderPresenter extends AbstractSliderPresenter implements SliderPresenterInterface
{
    /**
     * Render slider.
     *
     * @param string|Slider $slider
     * @param string $template blade template to render slider
     * @return string rendered slider HTML
     */
    public function render($slider, $config = [], $template = 'slider::frontend.flexslider.slider')
    {
        $slider = $this->findBySystemName($slider);

        if (!$slider) {
            return '';
        }

        $view = View::make($template)
            ->with([
                'slider' => $slider,
                'config' => $config
            ]);
        
        return $view->render();
    }


    /**
     * Get slider instance by system name
     *
     * @param string $systemName
     * @return Slider
     */
    private function findBySystemName($systemName)
    {
        return Slider::where('system_name', '=', $systemName)->first();
    }
}