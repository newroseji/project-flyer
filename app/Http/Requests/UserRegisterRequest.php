<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRegisterRequest extends Request
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
			'username' => 'required|min:3|max:50|unique:users',
			'firstname' => 'required|min:3|max:50',
			'middlename' => 'max:20',
			'lastname'  => 'required|min:3|max:50',
			'address1'  => 'max:60',
			'address2'  => 'max:30',
			'city'      => 'max:50',
			'state'     => 'max:2',
			'zip'       => 'max:55',
			'country'   => 'max:50',
			'email'     => 'required|email',
			'password'  => 'required|min:6|max:50|confirmed',
			'password_confirmation'=>'required|min:6|max:50'
        ];
    }
}
