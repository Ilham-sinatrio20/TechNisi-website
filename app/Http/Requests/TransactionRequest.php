<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class TransactionRequest extends FormRequest {
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
        switch ($this->method()) {
            case 'POST': {
                return [
                    'customer_id' => 'required|exists:customer,cust_id',
                    'id_technician' => 'required|exists:technician,technician_id',
                    'level' => 'required|string',
                    'price' => 'sometimes|numeric',
                    'desc' => 'required|string',
                ];
            } break;
            case 'PUT': {
                return [
                    'level' => 'sometimes|string',
                    'price' => 'required|integer',
                    'status' => 'required|string',
                    'desc' => 'sometimes|string',
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
