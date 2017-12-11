<?php

namespace App\Policies;

use App\Models\Access\User\User;
use App\Models\Batch\Batch;
use Illuminate\Auth\Access\HandlesAuthorization;

class BatchPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the batch.
     *
     * @param  \App\User  $user
     * @param  \App\Batch  $batch
     * @return mixed
     */
    public function view(User $user, Batch $batch)
    {
        //
    }

    /**
     * Determine whether the user can create batches.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the batch.
     *
     * @param  \App\User  $user
     * @param  \App\Batch  $batch
     * @return mixed
     */
    public function update(User $user, Batch $batch)
    {
        return isset($batch->institute) && $user->institute_id == $batch->institute_id;
    }

    /**
     * Determine whether the user can delete the batch.
     *
     * @param  \App\User  $user
     * @param  \App\Batch  $batch
     * @return mixed
     */
    public function delete(User $user, Batch $batch)
    {
        //
    }
}
