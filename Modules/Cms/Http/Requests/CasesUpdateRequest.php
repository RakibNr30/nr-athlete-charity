<?php

namespace Modules\Cms\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CasesUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'area_id' => 'required',
            'affected_people' => 'required',
            'needed_money' => 'required',
            'description' => 'required',
            'image' => 'sometimes|image|max:2048',
            'attachment' => 'sometimes|max:2048|mimes:pdf,doc,docx,ppt,xls,xlsx'
        ];
    }
}
