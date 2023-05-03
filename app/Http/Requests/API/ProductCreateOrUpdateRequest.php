<?php

namespace App\Http\Requests\API;

use App\Rules\MaxProductsJsonLimit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ProductCreateOrUpdateRequest extends FormRequest
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
            'key'  => [
                'required',
                'exists:api_keys,key'
            ],
            'data' => [
                'required',
                'JSON',
                new MaxProductsJsonLimit,
            ],
        ];
    }

    public function messages()
    {
        return [];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => true,
            'message' => 'Validation errors',
            'data' => $validator->errors(),
        ]));
    }
}
