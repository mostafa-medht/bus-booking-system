<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class GetAvailableSeatsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'start_station_id' => 'required|integer|exists:stations,id',
            'end_station_id' => 'required|integer|exists:stations,id',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        if ($validator->fails()) {
            throw new HttpResponseException(returnCustomValidationError('please review the following errors',
                $validator->errors()));
        }
    }
}
