<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanphamRequest extends FormRequest
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
        switch ($this->method()):
            case 'POST':
                switch ($currentAction) {
                    case 'add':
                        $rules = [
                            'title' => "required | unique:products", //unique duy nhất 
                            'price' => "required ",
                            'quantity' => "required ",
                            // 'img' => "required   ",
                            'categories_id' => "required ",
                        ];
                        break;
              
                    case 'updateSp':
                        $rules = [
                            'title' => "required | unique:products", //unique duy nhất 
                            'price' => "required ",
                            'quantity' => "required ",
                            // 'img' => "required   ",
                            'categories_id' => "required ",
                        ];
                        break;
                        # code...
                        default:
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
            'title.required' => "Chưa nhập tên sản phẩm",
            'title.unique' => "Tên sẩn phẩm đã tồn tại",
            'price.required' => "Chưa nhập giá",
            // 'price.min'=>"Giá phải lớn hơn 0",
            'quantity.required' => "Chưa nhập số lượng",
            // 'quantity.min'=>"Số lượng lớn hơn 0",
            // 'quantity.min'=>"số lượng lớn hơn 1",
            // 'img.required'=>"chưa có ảnh",
            // 'img.file'=>"phải là file ảnh được tải lên",
            'categories_id.required' => "Chưa chọn danh mục",

        ];
    }
}
