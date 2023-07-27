<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class valiUserChangePwd extends FormRequest
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
            'changePwd'=>'required|min:8',
            'newPwd'=>'required|min:8',
            'confirmnewPwd'=>'required|min:8|same:newPwd'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'This field is nullable',
            'min'=>'Password must have :min character',
            'same'=>"The confirm Password doesn't match"
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
