<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrokerRequest extends FormRequest
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
            'name' => [ $this->isPostRequest , 'unique:brokers', 'max:225'],
            'address' => [ $this->isPostRequest, 'max:225'],
            'city' => [$this->isPostRequest],
            'zip_code' => [$this->isPostRequest, 'numeric', 'digits:10'],
            'logo_path' => [$this->isPostRequest]
        ];
    }

    public function isPostRequest()
    {
        return request()->isMethod('post') ? 'required' : 'sometimes';
    }
}
