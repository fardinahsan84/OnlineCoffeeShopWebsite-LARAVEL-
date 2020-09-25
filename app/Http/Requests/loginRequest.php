<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
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
        'username'=>'required',
        'password'=>'required'

      ];
    }
    public function messages(){
    return [
        'username.required'  => "Username can't be empty...",
        'password.required'  => "password can't be empty..."

    ];
  }
}
