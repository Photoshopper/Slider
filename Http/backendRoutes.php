<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/slider'], function (Router $router) {
    $router->bind('slider', function ($id) {
        return app('Modules\Slider\Repositories\SliderRepository')->find($id);
    });
    $router->get('sliders', [
        'as' => 'admin.slider.slider.index',
        'uses' => 'SliderController@index',
        'middleware' => 'can:slider.sliders.index'
    ]);
    $router->get('sliders/create', [
        'as' => 'admin.slider.slider.create',
        'uses' => 'SliderController@create',
        'middleware' => 'can:slider.sliders.create'
    ]);
    $router->post('sliders', [
        'as' => 'admin.slider.slider.store',
        'uses' => 'SliderController@store',
        'middleware' => 'can:slider.sliders.create'
    ]);
    $router->get('sliders/{slider}/edit', [
        'as' => 'admin.slider.slider.edit',
        'uses' => 'SliderController@edit',
        'middleware' => 'can:slider.sliders.edit'
    ]);
    $router->put('sliders/{slider}', [
        'as' => 'admin.slider.slider.update',
        'uses' => 'SliderController@update',
        'middleware' => 'can:slider.sliders.edit'
    ]);
    $router->delete('sliders/{slider}', [
        'as' => 'admin.slider.slider.destroy',
        'uses' => 'SliderController@destroy',
        'middleware' => 'can:slider.sliders.destroy'
    ]);
    $router->bind('slide', function ($id) {
        return app('Modules\Slider\Repositories\SlideRepository')->find($id);
    });
    $router->get('{slider_id}/slides', [
        'as' => 'admin.slider.slide.index',
        'uses' => 'SlideController@index',
        'middleware' => 'can:slider.slides.index'
    ]);
    $router->get('{slider_id}/slides/create', [
        'as' => 'admin.slider.slide.create',
        'uses' => 'SlideController@create',
        'middleware' => 'can:slider.slides.create'
    ]);
    $router->post('slides', [
        'as' => 'admin.slider.slide.store',
        'uses' => 'SlideController@store',
        'middleware' => 'can:slider.slides.create'
    ]);
    $router->get('{slider_id}/slides/{slide}/edit', [
        'as' => 'admin.slider.slide.edit',
        'uses' => 'SlideController@edit',
        'middleware' => 'can:slider.slides.edit'
    ]);
    $router->put('slides/{slide}', [
        'as' => 'admin.slider.slide.update',
        'uses' => 'SlideController@update',
        'middleware' => 'can:slider.slides.edit'
    ]);
    $router->delete('{slider_id}/slides/{slide}', [
        'as' => 'admin.slider.slide.destroy',
        'uses' => 'SlideController@destroy',
        'middleware' => 'can:slider.slides.destroy'
    ]);
    $router->post('slides/updateSort', [
        'as' => 'admin.slider.slide.updateSort',
        'uses' => 'SlideController@updateSort'
    ]);
// append


});
