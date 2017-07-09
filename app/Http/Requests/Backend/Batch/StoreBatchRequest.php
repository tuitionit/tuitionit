<?php

namespace App\Http\Requests\Backend\Batch;

use App\Http\Requests\Request;

/**
 * Class StoreBatchRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class StoreBatchRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return access()->allow('manage-batches');
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
			'description' => 'max:500',
			'type' => 'required',
			'location' => 'required',
			'start_date' => 'date_format:d/m/Y',
			'end_date' => 'date_format:d/m/Y|after_or_equal:start_date',
		];
	}
}
