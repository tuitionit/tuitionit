<?php

namespace App\Http\Requests\Backend\Subject;

use App\Http\Requests\Request;

/**
 * Class ManageSubjectRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class ManageSubjectRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return access()->allow('manage-subjects');
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
