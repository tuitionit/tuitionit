<?php

namespace App\Http\Controllers\Backend\Batch\Traits;

use App\Models\Batch\Batch;
use App\Http\Requests\Backend\Batch\AddStudentsRequest;

/**
 * Trait BatchStudents
 * package App\Http\Controllers\Backend\Batch\Traits
 */
trait BatchStudents
{
    /**
     * Add students to the batch
     *
     * @param \App\Models\Batch\Batch
     *
     */
    function addStudents(Batch $batch, AddStudentsReqeuest $request)
    {
        $students = $batch->students()->syncWithoutDetaching($request->input('students'));

        return redirect()->route('admin.batch.show', ['id' => $batch->id])->withFlashSuccess(trans_choice('alerts.backend.batch.students_added', count($students)));
    }
}
