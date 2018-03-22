<?php

namespace Modules\Admin\Http\Requests;

use App\Http\Requests\BaseRequest;

class EditAdminRequest extends BaseRequest
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
            'email' => 'required|email|unique:users,email,' . \Route::input('id'),
            'password' => 'nullable|min:6|max:32|confirmed'
        ];
    }
}
