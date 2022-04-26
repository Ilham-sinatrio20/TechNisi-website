<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class TechnicianRequest extends FormRequest {
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
    public function rules() {
        switch($this->method()){
            case 'POST': {
                return [
                    'specialist_id' => 'required|integer|exists:specialization,id_specialist',
                    'user_id' => 'required|integer|exists:users,id',
                    'desc' => 'required|string|max:255',
                    'certification' => 'required|string|max:255',
                    'address' => 'required|string|max:255',
                    'photos' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ];
            } break;
            case 'PUT': {
                return [
                    'desc' => 'sometimes|string|max:255',
                    'certification' => 'sometimes|string|max:255',
                    'address' => 'sometimes|string|max:255',
                    'photos' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'specialist_id' => 'required|integer|exists:specialization,id_specialist',
                ];
            } break;
        }
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json([
            'message' => $validator->errors()],
        422));
    }
}
