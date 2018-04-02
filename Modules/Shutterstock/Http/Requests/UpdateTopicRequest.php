<?php

namespace Modules\Shutterstock\Http\Requests;

use App\Http\Requests\BaseRequest;

class UpdateTopicRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:shutterstock.topics,name,' . \Route::input('id'),
        ];
    }
}
