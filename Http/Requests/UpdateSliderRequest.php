<?php

namespace Modules\Slider\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route()->getParameter('slider')->id;

        return [
            'name' => 'required',
            'system_name' => 'required|alpha_dash|unique:slider__sliders,system_name,'.$id,
            'width' => 'required|integer',
            'height' => 'required|integer'
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
