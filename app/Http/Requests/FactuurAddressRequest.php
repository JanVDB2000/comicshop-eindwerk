<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FactuurAddressRequest extends FormRequest
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
            "street_one_s" => 'required',
            "country_s" => 'required',
            "state_s" => 'required',
            "zip_s" => 'required',
            "addressType" => 'required',
            "street_one_b" =>'required_if:addressType,==,SBD',
            "country_b" =>'required_if:addressType,==,SBD',
            "state_b" =>'required_if:addressType,==,SBD',
            "zip_b" =>'required_if:addressType,==,SBD',
        ];

    }
}
