<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                            'email' => "required | unique:users", //unique duy nhất 
                            'name' => "required ",
                            'password' => "required ",
                        ];
                        break;
                        case 'updateNd':
                            $rules = [
                                'email' => "required | unique:users", //unique duy nhất 
                                'name' => "required ",
                                'password' => "required ",
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
            'email.required'=>"Chưa nhập email",
            'email.unique'=>"Email đã tồn tại",
            'name.required'=>"Chưa nhập tên",
            'password.required'=>"Chưa nhập Password",
        ];
     }
   
}
