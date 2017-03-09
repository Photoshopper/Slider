<div class="box-body">

    <div class='form-group{{ $errors->has('name') ? ' has-error' : '' }}'>
        {!! Form::label('name', trans('slider::sliders.form.name') . ' *') !!}
        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
    </div>

    <div class='form-group{{ $errors->has('system_name') ? ' has-error' : '' }}'>
        {!! Form::label('system_name', trans('slider::sliders.form.system name') . ' *') !!}
        {!! Form::text('system_name', old('system_name'), ['class' => 'form-control']) !!}
        {!! $errors->first('system_name', '<span class="help-block">:message</span>') !!}
    </div>

    <div class='form-group{{ $errors->has('width') ? ' has-error' : '' }}'>
        {!! Form::label('width', trans('slider::sliders.form.width') . ' *') !!}
        {!! Form::text('width', old('width'), ['class' => 'form-control']) !!}
        {!! $errors->first('width', '<span class="help-block">:message</span>') !!}
    </div>

    <div class='form-group{{ $errors->has('height') ? ' has-error' : '' }}'>
        {!! Form::label('height', trans('slider::sliders.form.height') . ' *') !!}
        {!! Form::text('height', old('height'), ['class' => 'form-control']) !!}
        {!! $errors->first('height', '<span class="help-block">:message</span>') !!}
    </div>

</div>