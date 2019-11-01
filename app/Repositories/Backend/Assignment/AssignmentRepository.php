<?php

namespace App\Repositories\Backend\Assignment;

use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Assignment\StudentAttended;
use App\Events\Backend\Assignment\StudentLeft;
use App\Events\Backend\Assignment\AssignmentDeleted;
use App\Events\Backend\Assignment\AssignmentUpdated;
use App\Repositories\BaseRepository;
use App\Models\Assignment\Assignment;

/**
 * Class AssignmentRepository
 * @package App\Repositories\Backend\Assignment
 */
class AssignmentRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Assignment::class;

    /**
     * @param int  $status
     *
     * @return mixed
     */
    public function getForDataTable()
    {
        /**
         * Note: You must return deleted_at or the Assignment getActionButtonsAttribute won't
         * be able to differentiate what buttons to show for each row.
         */
        $dataTableQuery = $this->query()
            ->select('assignments.*');

        // active() is a scope on the AssignmentScope trait
        return $dataTableQuery;
    }

    /**
     * @param string  $query
     *
     * @return mixed
     */
    public function searchByName($query)
    {
        $searchQuery = $this->query()
            ->select([
                'assignments.id',
                'assignments.name',
            ])
            ->where('name', 'LIKE', '%' . $query . '%');

        return $searchQuery;
    }

    /**
     * @param Model $subject
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $subject)
    {
        if ($subject->delete()) {
            event(new AssignmentDeleted($subject));

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.assignments.delete_error'));
    }
}
