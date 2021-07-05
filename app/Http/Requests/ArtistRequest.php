<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtistRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required_without:id',
            'Address' => 'required|string',
            'National_ID' => 'required|numeric|regex:/^([0-9]*)$/|min:13',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'image' => 'required_without:id|mimes:jpg,bmp,png',
            'area_id' => 'required',
            'citie_id' => 'required',
            'rating_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => trans('validation.required'),
            'password.required' => trans('validation.required'),
            'name.required' => trans('validation.required'),
            'phone.required' => trans('validation.required'),
            'Address.required' => trans('validation.required'),
            'image.required' => trans('validation.required'),
            'National_ID.required' => trans('validation.required'),
            'citie_id.required' => trans('validation.required'),
            'rating_id.required' => trans('validation.required'),
            'area_id.required' => trans('validation.required'),
        ];
    }
}
