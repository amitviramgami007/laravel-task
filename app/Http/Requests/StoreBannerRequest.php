<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return
                [
                    'image_name' => 'required',
                    'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return
                [
                    'image_name' => 'required',
                    'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
                ];
            }
            default: break;
        }
    }
}
