<?php

namespace App\Http\Requests\Backend\Teacher;

use App\Http\Requests\Request;

/**
 * Class StoreTeacherRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class StoreTeacherRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return access()->allow('manage-teachers');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'title' => 'required',
			'name' => 'required',
			'subjects' => 'array',
		];
	}
}
