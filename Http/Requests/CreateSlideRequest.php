<?php

namespace Modules\Slider\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateSlideRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'required',
            'weight' => 'integer'
        ];
    }

    public function translationRules()
    {
        return [
            'title' => 'required',
            'url' => 'url'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    
}
