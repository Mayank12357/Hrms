<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:100',
                'min:3',
            ],
            'roles' => [
                'required',
                'array'
            ]
        ];

         if($this->getMethod() == "POST"){

            $rules += [
                'email' => [
                    'required',
                    'email',
                    'max:100',
                    'min:3',
                    'unique:users,email,NULL,id',
                ],
                'password' => [
                    'required',
                    'confirmed',
                    'max:50',
                    'min:8',
                ]
            ];
        }

        if($this->getMethod() == "PUT"){

            $rules += [
                'email' => [
                    'required',
                    'email',
                    'max:100',
                    'min:3',
                    'unique:users,email,'.$this->user.',id',
                ],
                'password' => [
                    'nullable',
                    'confirmed',
                    'max:50',
                    'min:8',
                ]
            ];
        }

        return $rules;
    }
}