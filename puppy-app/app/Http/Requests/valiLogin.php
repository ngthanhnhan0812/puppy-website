<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class valiLogin extends FormRequest
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
            'loginEmail'=>'required|email|min:5',
            'loginPwd'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'required'=>'This field is nullable',
            'email'=>"Must be email format",
            'min'=>'At least :min character'
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
