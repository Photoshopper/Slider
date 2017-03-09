<div class="flexslider">
    <ul class="slides">
        @foreach($slider->slides as $slide)
            <li>
                @if(!empty($slide->getUrl()))
                    <a href="{{ $slide->getUrl() }}" target="{{ $slide->target }}">
                @endif
                <img src="<?= Croppa::url('/storage/slides/'.$slide->image, $slider->width, $slider->height) ?>" alt="" />
                @if(!isset($config['caption']) || isset($config['caption']) && $config['caption'] === true)
                    <div class="flex-caption">
                        <div class="slider-title">{{ $slide->title }}</div>
                        <div class="slider-text">{!! $slide->text !!}</div>
                    </div>
                @endif
                @if(!empty($slide->getUrl()))
                    </a>
                @endif
            </li>
        @endforeach
    </ul>
</div>

@section('scripts')
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('modules/slider/css/flexslider.css') }}">
    <script src="{{ asset('modules/slider/js/jquery.flexslider-min.js') }}"></script>
    <script>
        $( document ).ready(function() {
            $('.flexslider').flexslider({
                @if(isset($config['properties']))
                    @foreach($config['properties'] as $property_name => $property_value)
                        {{ $property_name }}: "{{ $property_value }}",
                    @endforeach
                @endif
            });
        });
    </script>
@stop