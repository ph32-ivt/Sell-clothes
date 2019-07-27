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
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => 'required|unique:users,name',
            'email'       => 'required|unique:users,email',
            'password'    => 'required',
            're-password' => 'required|same:password',
            'telephone'   => 'required',
            'address'     => 'required',
            'role_id'     => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => 'Please enter name.',
            'name.unique'          => 'This name is exists. Please enter another name !',
            'email.required'       => 'Please enter email.',
            'email.uniquired'      => 'This email is exists.',
            'password.required'    => 'Please enter password.',
            're-password.required' => 'Please enter re-password.',
            're-password.same'     => 'Confirm Password don\'t math.',
            'telephone.required'   => 'Please enter telephone.',
            'address.required'     => 'Please enter address.',
            'role_id.required'     => 'Please choose level.' 
        ];
    }
}
