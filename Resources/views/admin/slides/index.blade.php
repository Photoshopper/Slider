@extends('layouts.master')

@section('content-header')
    <h1>
        {{ $slider->name }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.slider.slider.index') }}">{{ trans('slider::sliders.title.sliders') }}</a></li>
        <li class="active">{{ $slider->name }}</li>
    </ol>
@stop

@section('styles')
    <style>
        .ui-sortable-placeholder {height:135px; }
        .handle {cursor: pointer; }
    </style>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.slider.slide.updateSort'], 'method' => 'post']) !!}
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.slider.slide.create', [$slider->id]) }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('slider::slides.button.create slide') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <!-- /.box-header -->
                <div class="box-body">
                    <?php if ($slides->count() > 0): ?>
                        <div class="table-responsive">
                            <table class="slides table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>{{ trans('slider::slides.table.image') }}</th>
                                    <th>{{ trans('slider::slides.table.title') }}</th>
                                    <th>{{ trans('slider::slides.table.status') }}</th>
                                    <th>{{ trans('slider::slides.table.order') }}</th>
                                    <th>{{ trans('core::core.table.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($slides as $key => $slide): ?>
                                <tr>
                                    <td width="30">
                                        <a class="handle"><span class="glyphicon glyphicon-move"></span></a>
                                    </td>
                                    <td width="400">
                                        <img src="<?= Croppa::url('/storage/slides/'.$slide->image, $slider->width, $slider->height) ?>" alt="" class="img-responsive" />
                                    </td>
                                    <td>
                                        {{ $slide->title }}
                                    </td>
                                    <td>
                                        <span class="label {{ $slide->published ? 'bg-green' : 'bg-gray' }}">
                                            {{ $slide->published ? trans('slider::slides.table.published') : trans('slider::slides.table.not published') }}
                                        </span>
                                    </td>
                                    <td>
                                        <input class="weight form-control" name="weight[{{ $slide->id }}]" type="text" value="{{ $slide->weight }}">
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.slider.slide.edit', [$slider->id, $slide->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                            <button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.slider.slide.destroy', [$slider->id, $slide->id]) }}"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- /.box-body -->
                        </div>
                    <?php else : ?>
                        {{ trans('slider::slides.table.no slides') }}
                    <?php endif; ?>
                </div>
                <!-- /.box -->
            </div>
            <?php if ($slides->count() > 0): ?>
            <div class="box-footer">
                {{ Form::submit(trans('core::core.button.update'), ['class' => 'btn btn-primary btn-flat']) }}
            </div>
            <?php endif; ?>
        </div>
    </div>
    {!! Form::close() !!}
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('slider::slides.title.create slide') }}</dd>
    </dl>
@stop

@section('scripts')
    {!! Theme::script('js/vendor/jquery-ui-1.10.3.min.js') !!}

    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.slider.slide.create', [$slider->id]) ?>" }
                ]
            });
        });
    </script>

    <script>
        function slidesSortable($element) {
            var fixHelper = function(e, ui) {
                ui.children().each(function() {
                    $(this).width($(this).width());
                });
                return ui;
            };
            $element.sortable({helper: fixHelper}).disableSelection();
            $element.on("sortupdate", function (event, ui) {
                $('.weight').each(function (e) {
                    $(this).val($('.weight').index(this));
                });
            });
        }

        slidesSortable($('.slides tbody'));
    </script>
@stop
