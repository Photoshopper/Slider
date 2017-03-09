<div class="form-group link-type-depended link-page">
    {!! Form::label('page', trans('menu::menu-items.form.page')) !!}
    <select class="form-control" name="page_id" id="page">
        <option value=""></option>
        <?php foreach ($pages as $page): ?>
        <option value="{{ $page->id }}" {{ old('page_id') == $page->id ? 'selected' : '' }}>{{ $page->title }}</option>
        <?php endforeach; ?>
    </select>
</div>


@include('ImageManager::_scripts')
@include('ImageManager::_image-input', [
    'label' => trans('slider::slides.form.image') . ' *',
    'field_name' => 'image',
    'upload_dir' => 'slides',
    'size' => [$width, $height]
])

{{ Form::hidden('slider_id', $slider_id) }}