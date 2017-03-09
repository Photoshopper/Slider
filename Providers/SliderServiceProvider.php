<?php

namespace Modules\Slider\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;

class SliderServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    public function boot()
    {
        $this->publishConfig('slider', 'permissions');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Slider\Repositories\SliderRepository',
            function () {
                $repository = new \Modules\Slider\Repositories\Eloquent\EloquentSliderRepository(new \Modules\Slider\Entities\Slider());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Slider\Repositories\Cache\CacheSliderDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Slider\Repositories\SlideRepository',
            function () {
                $repository = new \Modules\Slider\Repositories\Eloquent\EloquentSlideRepository(new \Modules\Slider\Entities\Slide());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Slider\Repositories\Cache\CacheSlideDecorator($repository);
            }
        );
        $this->app->bind(
            'slider',
            function() {
                return new \Modules\Slider\Presenters\SliderPresenter;
            }
        );
    }

}
