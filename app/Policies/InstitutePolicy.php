<?php

namespace App\Policies;

use App\Models\Access\User\User;
use App\Models\Institute\Institute;
use Illuminate\Auth\Access\HandlesAuthorization;

class InstitutePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the institute.
     *
     * @param  \App\User  $user
     * @param  \App\Institute  $institute
     * @return mixed
     */
    public function view(User $user, Institute $institute)
    {
        //
    }

    /**
     * Determine whether the user can create institutes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the institute.
     *
     * @param  \App\User  $user
     * @param  \App\Institute  $institute
     * @return mixed
     */
    public function update(User $user, Institute $institute)
    {
        return access()->allow('manage-institute') && $institute->id == $user->institute_id;
    }

    /**
     * Determine whether the user can manage the institute.
     *
     * @param  \App\User  $user
     * @param  \App\Institute  $institute
     * @return mixed
     */
    public function manage(User $user, Institute $institute)
    {
        return access()->allow('manage-institute') && $institute->id == $user->institute_id;
    }

    /**
     * Determine whether the user can delete the institute.
     *
     * @param  \App\User  $user
     * @param  \App\Institute  $institute
     * @return mixed
     */
    public function delete(User $user, Institute $institute)
    {
        //
    }
}
