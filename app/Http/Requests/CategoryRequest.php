<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{


     private $table = 'categories';
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
           'name' =>'bail|max:500|required',
           'created_by' => 'required|max:50',
            'modified_by' => 'required|max:50',
          
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Chưa nhập giá trị Name',
            'name.max' => ' Name :input Chieu dai ko qua :max ky tu',
            
        ];
    }
    public function attributes()
    {
        return [
          
        ];
    }
}
