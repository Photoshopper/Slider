<div class='form-group{{ $errors->has("$lang.title") ? ' has-error' : '' }}'>
    {!! Form::label("{$lang}[title]", trans('slider::slides.form.title') . ' *') !!}
    {!! Form::text("{$lang}[title]", old("$lang.title"), ['class' => 'form-control']) !!}
    {!! $errors->first("$lang.title", '<span class="help-block">:message</span>') !!}
</div>

<div class='form-group{{ $errors->has("$lang.text") ? ' has-error' : '' }}'>
    {!! Form::label("{$lang}[text]", trans('slider::slides.form.text')) !!}
    {!! Form::textarea("{$lang}[text]", old("$lang.text"), ['class' => 'form-control ckeditor']) !!}
    {!! $errors->first("$lang.text", '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group link-type-depended link-internal">
    {!! Form::label("{$lang}[uri]", trans('menu::menu.form.uri')) !!}
    <div class='input-group{{ $errors->has("$lang.uri") ? ' has-error' : '' }}'>
        <span class="input-group-addon">/{{ $lang }}/</span>
        {!! Form::text("{$lang}[uri]", old("{$lang}[uri]"), ['class' => 'form-control']) !!}
        {!! $errors->first("$lang.uri", '<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has("$lang.url") ? ' has-error' : '' }} link-type-depended link-external">
    {!! Form::label("{$lang}[url]", trans('menu::menu.form.url')) !!}
    {!! Form::text("{$lang}[url]", old("{$lang}[url]"), ['class' => 'form-control']) !!}
    {!! $errors->first("$lang.url", '<span class="help-block">:message</span>') !!}
</div>