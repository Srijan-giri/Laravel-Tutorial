<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username'=>'required',
            'useremail' => 'required|email',
            'userpass' => 'required|alpha_num|min:6',
            'userage' => 'required|numeric| min:18',  // min:18 , between :18,30
            'usercity' => 'required'
        ];
    }

    /**
     * Get the validation error messages.
     *
     * @return array<string, string>
     */

    public function messages()
    {
        return[
            'username.required'=>' :attribute is required!',
            'useremail.required'=>':attribute is required!',
            'userpass.required'=>':attribute is required!',
            'userage.required'=>':attribute is required!',
            'usercity.required'=>':attribute is required!',
            'userage.numeric' =>':attribute must be numeric!',
            'userage.min'=>':attribute should not less than 18 years old!',
            'userpass.alpha_num'=>':attribute must be alpha numeric!',
            'userpass.min'=>':attribute must be at least 6 characters long!',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */

    public function attributes()
    {
        return [
            'username'=>'User Name',
            'useremail'=>'User Email',
            'userpass'=>'User Password',
            'userage'=>'User Age',
            'usercity'=> 'User City'
        ];
    }


    protected function prepareForValidation(){
        $this->merge([
            // 'username'=> strtoupper($this->username),
            'username' => Str::slug($this->username),
        ]);
    }


    protected $stopOnFirstFailure = true;


}
