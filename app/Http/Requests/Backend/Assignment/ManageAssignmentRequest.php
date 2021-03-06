<?php

namespace App\Http\Requests\Backend\Assignment;

use App\Http\Requests\Request;

/**
 * Class ManageAssignmentRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class ManageAssignmentRequest extends Request
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
            //
        ];
    }
}
