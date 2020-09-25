<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editProfileRequest extends FormRequest
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
        'password'=>'required|min:6',
        'email'=>'required',
        'phone'=>'required|numeric',
        'address'=>'required|string'
      ];
    }

    public function messages(){

      return [
          'password.required'  => "password can't be empty...",
          'password.min'  => "must be at least 6 character...",
          'email.required'  => "email can't be empty...",
          'phone.required'  => "phone can't be empty...",
          'phone.numeric'  =>"phone must be numeric",
          'address.required'  => "address can't be empty...",
          'address.string'  => "address must be string..."

      ];
  }
}
