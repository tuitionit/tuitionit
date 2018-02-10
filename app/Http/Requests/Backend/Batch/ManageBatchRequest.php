<?php

namespace App\Http\Requests\Backend\Batch;

use App\Http\Requests\Request;

/**
 * Class ManageBatchRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class ManageBatchRequest extends Request
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
            //
        ];
    }
}
