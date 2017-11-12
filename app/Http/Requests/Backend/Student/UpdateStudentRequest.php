<?php

namespace App\Http\Requests\Backend\Student;

use App\Http\Requests\Request;

/**
 * Class UpdateStudentRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class UpdateStudentRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return access()->allow('manage-students');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'index_number' => 'required|unique:tenant.students,index_number,' . $this->student->id,
			'name' => 'required',
		];
	}
}
