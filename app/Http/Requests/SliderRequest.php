<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{


     private $table = 'sliders';
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
        $notThumb = 'bail|required|max:500|image';
        $notName = "bail|max:500|required|unique:$this->table,name";

       if(!empty($id)){
        $notThumb = 'bail|max:500|image';
        $notName = "bail|max:500|required|unique:$this->table,name,$id"; //cách 1
        // $notName .= ",$id"; //cách 2
       }

        return [
            // 'name' =>" bail|max:500|required|unique:sliders,name",
            // 'name' => $notName, //chuyền vào tên table và tên cột\
            'name' =>'bail|max:500|required',
            'description' => 'required',
            'link' => 'bail|required|max:200|url', 
            'created_by' => 'required|max:50',
            'modified_by' => 'required|max:50',
            'thumb' => $notThumb, 
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
