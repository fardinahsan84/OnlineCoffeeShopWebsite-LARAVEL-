<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editProductRequest extends FormRequest
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
        'price'=>'required|numeric',
          'ingredients'=>'required'
      ];
    }

    public function messages(){

      return [
          'ingredients.required'  => "Ingredients can't be empty...",
          'price.required'  => "price can't be empty...",
          'price.numeric'  =>"Price must be numeric"

      ];
  }
}
