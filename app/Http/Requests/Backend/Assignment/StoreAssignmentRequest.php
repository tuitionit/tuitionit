<?php

namespace App\Http\Requests\Backend\Assignment;

use App\Http\Requests\Request;

/**
 * Class StoreAssignmentRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class StoreAssignmentRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('manage-assignments');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'max:1000',
            'type' => 'required',
            'start_time' => 'required|date_format:"Y-m-d H:i"',
            'end_time' => 'sometimes|date_format:"Y-m-d H:i"|after:start_time',
        ];
    }
}
