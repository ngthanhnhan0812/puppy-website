<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class valiChangeProfile extends FormRequest
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
            'editName'=>'required|min:10',
            'editAddress'=>'required|min:5',
            'editDOB'=>'required|date_format:Y-m-d|after_or_equal:1920-01-01',
            'editGender'=>'required',
            'editEmail'=>'required|email|min:8',
            'editAvatar'=>'mimes:jpeg,png,jpg,gif'
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
            'mimes'=>"The file must have the format jpeg,png,jpg,gif"
            
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
