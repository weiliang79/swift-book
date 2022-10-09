<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
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
            "firstName" => "required|min:1|max:255",
            "lastName" => "required|min:1|max:255",
            "address" => "required|min:1|max:255",
            "address2" => "nullable|min:1|max:255",
            "state" => ["required", Rule::in([
                "johor",
                "kedah",
                "kelantan",
                "melaka",
                "negeri_sembilan",
                "pahang",
                "perak",
                "perlis",
                "pulau_pinang",
                "sabah",
                "sarawak",
                "selangor",
                "terengganu",
                "kuala_lumpur",
                "labuan",
                "putrajaya",
            ])],
            "town" => "required|min:1|max:255",
            "postcode" => "required|numeric|digits:5",
            "phoneNumber" => "required|numeric",
            "rememberAddress" => "nullable|in:on"
        ];
    }
}
