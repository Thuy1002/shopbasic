<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
                        'title' => "required | unique:banner", //unique duy nhất 
                        // 'img' => "required | file", 
                       
                    ];
                    break;
                    case 'updatebanner':
                        $rules = [
                            'title' => "required | unique:banner", //unique duy nhất 
                            // 'img' => "required | file", 
                           
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
       'title.required'=>"Chưa nhập tên Banner",
       'title.unique'=>"Tên banner đã tồn tại",
    //    'img.required'=>"Banner chưa có file được chọn",
    //    'img.file'=>"Banner phải là file ",
   ];
}
}
