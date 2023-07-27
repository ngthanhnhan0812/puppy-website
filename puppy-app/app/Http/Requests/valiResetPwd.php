<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class valiResetPwd extends FormRequest
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
            'emailReset'=>'required|min:8|email|exists:user_p,user_Email',
        ];
    }

    public function messages()
    {
        return [
            'required'=>'This field is nullable',
            'email'=>"Must be email format",
            'min'=>'At least :min character',
            'exists'=>'Email does not exist ',
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
