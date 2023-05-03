<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhmucRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        $currentAction = $this->route()->getActionMethod(); //trỏ đến hàm add
        //   dd($currentAction);
        switch ($this->method()) :
            case 'POST':
                switch ($currentAction) {
                    case 'add':
                        $rules = [
                            'title' => "required | unique:categories", //unique duy nhất 
                           
                        ];
                        break;
                        case 'updateDm':
                            $rules = [
                                'title' => "required | unique:categories", //unique duy nhất 
                               
                            ];
                            break;
                    default:
                        # code...
                        break;
                }
                break;

            default:
                # code...
                break;
            endswitch;
                return $rules;
        
    }
    public function messages()
    {
       return [
           'title.required'=>"Chưa nhập tên danh mục",
           'title.unique'=>"Tên danh mục đã tồn tại",
       ];
    }
  
}
