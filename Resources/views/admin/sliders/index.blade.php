@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('slider::sliders.title.sliders') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('slider::sliders.title.sliders') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.slider.slider.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('slider::sliders.button.create slider') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <!-- /.box-header -->
                <div class="box-body">
                    <?php if ($sliders->count() > 0): ?>
                        <div class="table-responsive">
                            <table class="data-table table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>{{ trans('slider::sliders.table.name') }}</th>
                                    <th>{{ trans('slider::sliders.table.system name') }}</th>
                                    <th>{{ trans('slider::sliders.table.size') }}</th>
                                    <th>{{ trans('core::core.table.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($sliders as $slider): ?>
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.slider.slide.index', [$slider->id]) }}">
                                            {{ $slider->name }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $slider->system_name }}
                                    </td>
                                    <td>
                                        {{ $slider->width }}x{{ $slider->height }}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.slider.slider.edit', [$slider->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                            <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.slider.slider.destroy', [$slider->id]) }}"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- /.box-body -->
                        </div>
                    <?php else : ?>
                        {{ trans('slider::sliders.table.no sliders') }}
                    <?php endif; ?>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('slider::sliders.title.create slider') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.slider.slider.create') ?>" }
                ]
            });
        });
    </script>
@stop
