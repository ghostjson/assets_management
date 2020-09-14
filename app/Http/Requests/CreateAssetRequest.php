<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAssetRequest extends FormRequest
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
            'name' => 'required',
            'type' => 'required',
            'number' => 'required',
            'model' => 'required',
            'serial_number' => 'required',
            'mac_id' => 'nullable',
            'memory' => 'required',
            'amount' => 'nullable',
            'storage' => 'required',
            'bill' => 'nullable',
        ];
    }
}
