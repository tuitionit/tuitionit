<?php

namespace App\Http\Requests\Backend\Batch;

use Illuminate\Validation\Rule;
use App\Http\Requests\Request;
use App\Models\Batch\Batch;
use App\Models\Student\Student;

/**
 * Class RemoveStudentsRequest
 * @package App\Http\Requests\Backend\Batch
 */
class RemoveStudentsRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $batch = $this->route('batch');

        return !!$batch && $this->user()->can('update', $batch);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'students'     => 'required|array',
        ];
    }
}
