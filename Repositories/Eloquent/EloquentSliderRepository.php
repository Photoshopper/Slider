<?php

namespace Modules\Slider\Repositories\Eloquent;

use Modules\Slider\Repositories\SliderRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use ImageManager;

class EloquentSliderRepository extends EloquentBaseRepository implements SliderRepository
{
    /**
     * @param $model
     * @return boolean
     */
    public function destroy($model)
    {
        if($model->allSlides->count() > 0) {
            foreach ($model->allSlides as $slide) {
                ImageManager::delete($slide->image, 'slides');
            }
        }

        return $model->delete();
    }
    
}
