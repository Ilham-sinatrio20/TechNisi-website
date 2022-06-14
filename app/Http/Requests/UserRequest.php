<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
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
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|min:10|max:255|unique:users',
                    'username' => 'required|string|min:10|max:100|unique:users',
                    'phone' => 'required|string|max:20|min:11',
                    'id_role' => 'required|integer|exists:role,id',
                    'password' => 'required|string|min:7|max:255',
                ];
            } break;
            case 'PUT': {
                return [
                    'name' => 'sometimes|string|max:255',
                    'email' => 'sometimes|string|email|min:15|max:255',
                    'username' => 'sometimes|string|min:10|max:100',
                    'phone' => 'sometimes|string|max:20|min:11',
                    'password' => 'sometimes|string|min:8|max:255',
                ];
            } break;
        }
    }

    // protected function failedValidation(Validator $validator) {
    //     throw new HttpResponseException(response()->json([
    //         'message' => $validator->errors()],
    //     422));
    // }
}
