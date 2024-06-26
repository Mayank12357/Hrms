<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleFormRequest extends FormRequest
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
        $rules = [
            'permission' => [
                'required',
            ],
        ];

         if($this->getMethod() == "POST"){

            $rules += [
                'name' => [
                    'required',
                    'string',
                    'max:100',
                    'min:3',
                    'unique:roles,name,NULL,id',
                ],
            ];
        }

        if($this->getMethod() == "PUT"){

            $rules += [
                'name' => [
                    'required',
                    'string',
                    'max:100',
                    'min:3',
                    'unique:roles,name,'.$this->role.',id',
                ],
            ];
        }

        return $rules;
    }
}