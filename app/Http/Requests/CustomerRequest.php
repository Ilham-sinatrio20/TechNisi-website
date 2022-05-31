<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class CustomerRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        switch($this->method()){
            case 'POST': {
                return [
                    'address' => 'required|string|max:255',
                    'photos' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'user_id' => 'required|integer|exists:users,id'
                ];
            } break;
            case 'PUT': {
                return [
                    'address' => 'sometimes|string|max:255',
                    'photos' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ];
            } break;
        }
    }

    // protected function failedValidation(Validator $validator) {
    //     // throw new HttpResponseException(response()->json([
    //     //     'message' => $validator->errors()],
    //     // 422));

    //     throw ValidationException::withMessages(['message' => $validator->errors()]);
    // }
}
