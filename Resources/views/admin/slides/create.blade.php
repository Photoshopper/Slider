@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('slider::slides.title.create slide') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.slider.slider.index') }}">{{ trans('slider::sliders.title.sliders') }}</a></li>
        <li><a href="{{ route('admin.slider.slide.index', [$slider_id]) }}">{{ trans('slider::slides.title.slides') }}</a></li>
        <li class="active">{{ trans('slider::slides.title.create slide') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
@stop

@section('content')
    {!! Form::open(['route' => ['admin.slider.slide.store'], 'method' => 'post', 'files' => true]) !!}
    <div class="row">
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{ trans('core::core.title.translatable fields') }}</h3>
                </div>
                <div class="box-body">
                    <div class="nav-tabs-custom">
                        @include('partials.form-tab-headers')
                        <div class="tab-content">
                            <?php $i = 0; ?>
                            @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                                <?php $i++; ?>
                                <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                                    @include('slider::admin.slides.partials.create-trans-fields', ['lang' => $locale])
                                </div>
                            @endforeach
                        </div>
                    </div> {{-- end nav-tabs-custom --}}
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{ trans('core::core.title.non translatable fields') }}</h3>
                </div>
                <div class="box-body">
                    @include('slider::admin.slides.partials.create-fields')
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.slider.slide.index', [$slider_id])}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="checkbox">
                        <label for="published">
                            {!! Form::hidden('published', false) !!}
                            {!! Form::checkbox('published', true, 1, ['class' => 'flat-blue']) !!}
                            {{ trans('slider::slides.form.published') }}
                        </label>
                    </div>
                    <hr>
                    <div class="form-group {{ $errors->has('weight') ? 'has-error' : '' }}">
                        {!! Form::label('weight', trans('slider::slides.form.weight')) !!}
                        {!! Form::text('weight', old('weight'), ['class' => 'form-control']) !!}
                        {!! $errors->first('weight', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('target') ? 'has-error' : '' }}">
                        {!! Form::label('target', trans('slider::slides.form.target')) !!}
                        {!! Form::select('target', [
                            '_self' => trans('slider::slides.form.current tab'),
                            '_target' => trans('slider::slides.form.new tab')
                        ], old('target'), ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.slider.slide.index', [$slider_id]) ?>" }
                ]
            });
        });
        $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
        });
    </script>
@stop
