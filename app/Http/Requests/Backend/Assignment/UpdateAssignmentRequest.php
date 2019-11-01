<?php

namespace App\Http\Requests\Backend\Assignment;

use App\Http\Requests\Request;

/**
 * Class UpdateAssignmentRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class UpdateAssignmentRequest extends Request
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
            'name' => 'required|unique:tenant.subjects,name,' . $this->assignment->id,
            'description' => 'max:500',
        ];
    }
}
