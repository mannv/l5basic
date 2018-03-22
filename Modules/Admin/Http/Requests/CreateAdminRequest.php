<?php

namespace Modules\Admin\Http\Requests;

use App\Http\Requests\BaseRequest;

class CreateAdminRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:32|confirmed'
        ];
    }
}
