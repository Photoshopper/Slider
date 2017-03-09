<?php

namespace Modules\Slider\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Page\Entities\Page;
use Modules\Slider\Entities\Slide;
use Modules\Slider\Entities\Slider;
use Modules\Slider\Http\Requests\CreateSlideRequest;
use Modules\Slider\Repositories\SlideRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class SlideController extends AdminBaseController
{
    /**
     * @var SlideRepository
     */
    private $slide;

    public function __construct(SlideRepository $slide)
    {
        parent::__construct();

        $this->slide = $slide;
    }

    /**
     * Display a listing of the resource.
     *
     * @param int $slider_id
     * @return Response
     */
    public function index($slider_id)
    {
        $slider = Slider::findOrFail($slider_id);
        $slides = $slider->allSlides;

        return view('slider::admin.slides.index', compact('slides', 'slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int $slider_id
     * @return Response
     */
    public function create($slider_id)
    {
        $slider = Slider::findOrFail($slider_id);
        $width = $slider->width;
        $height = $slider->height;
        $pages = Page::all();

        return view('slider::admin.slides.create', compact('slider_id', 'width', 'height', 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateSlideRequest $request
     * @return Response
     */
    public function store(CreateSlideRequest $request)
    {
        $this->slide->create($request);

        return redirect()->route('admin.slider.slide.index', [$request->input('slider_id')])
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('slider::slides.title.slide')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $slider_id
     * @param  Slide $slide
     * @return Response
     */
    public function edit($slider_id, Slide $slide)
    {
        $slider = Slider::findOrFail($slider_id);
        $width = $slider->width;
        $height = $slider->height;
        $pages = Page::all();

        return view('slider::admin.slides.edit', compact('slide', 'slider_id', 'width', 'height', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Slide $slide
     * @param  CreateSlideRequest $request
     * @return Response
     */
    public function update(Slide $slide, CreateSlideRequest $request)
    {
        $this->slide->update($slide, $request);

        return redirect()->route('admin.slider.slide.index', [$request->input('slider_id')])
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('slider::slides.title.slide')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $slider_id
     * @param  Slide $slide
     * @return Response
     */
    public function destroy($slider_id, Slide $slide)
    {
        $this->slide->destroy($slide);

        return redirect()->route('admin.slider.slide.index', [$slider_id])
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('slider::slides.title.slide')]));
    }


    /**
     * Update weight values of slides
     *
     * @param $request
     * @return mixed
     */
    public function updateSort(Request $request)
    {
        foreach ($request->input('weight') as $key => $value) {
            Slide::where('id', $key)->update(['weight' => $value]);
        }

        return redirect()->back()->withSuccess(trans('slider::slides.messages.order is saved'));
    }
}
