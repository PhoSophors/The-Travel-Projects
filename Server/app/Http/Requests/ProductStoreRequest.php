<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        if(request()->isMethod('post')) {
            return [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'title' => 'required|string|max:258',
                'description' => 'required|string',
                'location' => 'required|string'
            ];
        } else {
            return [
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'title' => 'required|string|max:258',
                'description' => 'required|string',
                'location' => 'required|string|max:258',
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')) {
            return [
                'image.required' => 'Image is required!',
                'title.required' => 'Title is required!',
                'description.required' => 'Descritpion is required!',
                'location.required' => 'Location is required!'
            ];
        } else {
            return [
                'title.required' => 'Title is required!',
                'description.required' => 'Descritpion is required!',
                'location.required' => 'Location is required!'
            ];
        }
    }
}
