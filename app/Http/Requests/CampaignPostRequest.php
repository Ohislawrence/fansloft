<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignPostRequest extends FormRequest
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
            'duration' => 'required',
           'budget' => 'required|min:9999|numeric',
           'interest' => 'required',
           'freq' => 'required|numeric',
           'minfollowers' => 'required',
           'country' => 'required',
           'age' => 'required',
           //'gender' => 'required',
           'service' => 'required',
           'platform' => 'required',
           'quotes' => 'required',
           'tags' => 'required',
           'isproduct' => 'required',
           'details' => 'required',
           'cta' => 'required',
           'category' => 'required',
           //'post_text' => 'required',
           'campaign_name' => 'required',
           'interest' => 'required',
        ];
    }

    
}
