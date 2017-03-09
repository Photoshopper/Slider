<?php

namespace Modules\Slider\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Slider\Entities\Slider;
use Modules\Slider\Http\Requests\CreateSliderRequest;
use Modules\Slider\Http\Requests\UpdateSliderRequest;
use Modules\Slider\Repositories\SliderRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class SliderController extends AdminBaseController
{
    /**
     * @var SliderRepository
     */
    private $slider;

    public function __construct(SliderRepository $slider)
    {
        parent::__construct();

        $this->slider = $slider;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sliders = $this->slider->all();

        return view('slider::admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('slider::admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(CreateSliderRequest $request)
    {
        $slider = $this->slider->create($request->all());

        return redirect()->route('admin.slider.slide.index', [$slider->id])
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('slider::sliders.title.slider')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Slider $slider
     * @return Response
     */
    public function edit(Slider $slider)
    {
        return view('slider::admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Slider $slider
     * @param  Request $request
     * @return Response
     */
    public function update(Slider $slider, UpdateSliderRequest $request)
    {
        $this->slider->update($slider, $request->all());

        return redirect()->route('admin.slider.slider.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('slider::sliders.title.slider')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Slider $slider
     * @return Response
     */
    public function destroy(Slider $slider)
    {
        $this->slider->destroy($slider);

        return redirect()->route('admin.slider.slider.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('slider::sliders.title.slider')]));
    }
}
