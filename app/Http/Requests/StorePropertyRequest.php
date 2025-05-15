<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
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
            'address' => [ 'required', 'max:225'],
            'listing_type' => [ 'required'],
            'city' => [ 'required', 'max:225'],
            'zip_code' => [ 'required', 'numeric'],
            'description' => [ 'required'],
            'build_year' => [ 'required'],
            'price' => [ 'required'],
            'bedrooms' => [ 'required'],
            'bathrooms' => [ 'required'],
            'sqft' => [ 'required'],
            'price+sqft' => [ 'required'],
            'price_type' => [ 'required'],
            'status' => [ 'required'],
        ];
    }
}
