<?php

namespace App\Http\Controllers\Backend\Batch\Traits;

use App\Models\Batch\Batch;
use App\Http\Requests\Backend\Batch\AddStudentsRequest;
use App\Http\Requests\Backend\Batch\RemoveStudentsRequest;

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
        dd($request->input('students'));
        
        $students = $batch->students()->syncWithoutDetaching($request->input('students'));

        return redirect()->route('admin.batch.show', ['id' => $batch->id])->withFlashSuccess(trans_choice('alerts.backend.batch.students_added', count($students)));
    }

    /**
     * Remove students from the batch
     *
     * @param \App\Models\Batch\Batch
     *
     */
    function removeStudents(Batch $batch, RemoveStudentsReqeuest $request)
    {
        $students = $batch->students()->detach($request->input('students'));

        return redirect()->route('admin.batch.show', ['id' => $batch->id])->withFlashSuccess(trans_choice('alerts.backend.batch.students_added', count($students)));
    }
}
