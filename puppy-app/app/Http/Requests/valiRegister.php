<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class valiRegister extends FormRequest
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
            'regiName'=>'required|min:10',
            'regiAddress'=>'required|min:5',
            'regiDOB'=>'required|date_format:Y-m-d|after_or_equal:1920-01-01',
            'regiGender'=>'required',
            'regiEmail'=>'required|email|min:8|unique:user_p,user_Email',
            'regiPwd'=>'required|min:8',
            'regiConfirmPwd'=>'required|same:regiPwd'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'Please enter this field',
            'min'=>'At least :min character',
            'date_format'=>'The input must like dd/mm/yy',
            'after_or_equal'=>'Birth Day must be before 01-01-1920',
            'email'=>"Must be email format",
            'same'=>"The confirm Password doesn't match",
            'unique'=>'Email already exists, Please use another Email'
            
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function($validator){
             if ($validator->errors()->count()>0) {
                # code...
                $validator->errors()->add('msg','Please Check Back Again');
             }
        });
    }
}
