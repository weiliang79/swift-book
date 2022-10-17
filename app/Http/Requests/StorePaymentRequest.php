<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'cc_name' => 'required|max:255',
            'cc_number' => 'required|numeric|digits:16',
            'cc_expiration_month' => 'required|numeric|digits:2|min:1|max:31',
            'cc_expiration_year' => 'required|numeric|digits:4|min:2022|max:2029',
            'cc_cvv' => 'required|digits:3',
        ];
    }
}
