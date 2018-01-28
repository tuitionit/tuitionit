<?php

namespace App\Http\Requests\Backend\Attendance;

use App\Http\Requests\Request;

/**
 * Class UpdateAttendanceRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class UpdateAttendanceRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('manage-attendances');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:tenant.subjects,name,' . $this->attendance->id,
            'description' => 'max:500',
        ];
    }
}
