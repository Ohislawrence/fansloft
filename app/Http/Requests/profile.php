<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class profile extends FormRequest
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
        'name' => 'string',
           'mobilenumber' => 'numeric',
           'bio' => 'string',
           'state' => 'string',
           'country' => 'string',
           'Address' => 'string',
           'maincategory' => 'string',
           'morecategory' => 'string',
           'url' => 'string',
        ];
    }
}
