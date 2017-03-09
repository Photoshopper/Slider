<?php

namespace Modules\Slider\Repositories\Eloquent;

use Modules\Slider\Repositories\SlideRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use ImageManager;

class EloquentSlideRepository extends EloquentBaseRepository implements SlideRepository
{
    /**
     * @param  mixed  $request
     * @return object
     */
    public function create($request)
    {
        $data = $request->all();

        $data['image'] = ImageManager::upload($request, 'image', 'slides');

        $model = $this->model->create($data);

        return $model;
    }

    /**
     * @param $model
     * @param  array  $request
     * @return object
     */
    public function update($model, $request)
    {
        $data = $request->all();

        $data['image'] = ImageManager::upload($request, 'image', 'slides', $model->image);

        $model->update($data);

        return $model;
    }

    /**
     * @param $model
     * @return boolean
     */
    public function destroy($model)
    {
        ImageManager::delete($model->image, 'slides');

        return $model->delete();
    }


}
