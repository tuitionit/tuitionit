<?php

namespace App\Http\Requests\Backend\Course;

use App\Http\Requests\Request;

/**
 * Class ManageCourseRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class ManageCourseRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return access()->allow('manage-courses');
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
