<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class  UsersRequest extends FormRequest
{


     private $table = 'users';
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
        $id = $this->id;
        $avatar = 'bail|required|max:500|image';
        $username = "bail|max:500|required|unique:$this->table,username";

       if(!empty($id)){
        $avatar = 'bail|max:500|image';
        $username = "bail|max:500|required|unique:$this->table,name,$id"; //cách 1
       
       }

        return [
         
            // 'username' =>$username,
            // 'email' => 'required',
            // 'fullname' => 'bail|required|max:200', 
            // 'status' => 'required|max:50',
            // 'avatar' => $avatar, 
            'password' =>'bail|required|between:5,100|confirmed',
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
            'description' => ' field description',
        ];
    }
}
