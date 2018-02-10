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
    public function addStudents(Batch $batch, AddStudentsRequest $request)
    {
        $result = $batch->students()->syncWithoutDetaching($request->input('students'));

        return redirect()->route('admin.batches.show', ['id' => $batch->id])
            ->withFlashSuccess(trans_choice('alerts.backend.batches.students_added', count($result['attached'])));
    }

    /**
     * Remove students from the batch
     *
     * @param \App\Models\Batch\Batch
     *
     */
    public function removeStudents(Batch $batch, RemoveStudentsReqeuest $request)
    {
        $result = $batch->students()->detach($request->input('students'));

        return redirect()->route('admin.batch.show', ['id' => $batch->id])
            ->withFlashSuccess(trans_choice('alerts.backend.batch.students_added', count($result['attached'])));
    }
}
