<?php

namespace App\Repositories\Backend\Attendance;

use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Attendance\StudentAttended;
use App\Events\Backend\Attendance\StudentLeft;
use App\Events\Backend\Attendance\AttendanceDeleted;
use App\Events\Backend\Attendance\AttendanceUpdated;
use App\Repositories\BaseRepository;
use App\Models\Attendance\Attendance;

/**
 * Class AttendanceRepository
 * @package App\Repositories\Backend\Attendance
 */
class AttendanceRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Attendance::class;

    /**
     * @param int  $status
     *
     * @return mixed
     */
    public function getForDataTable()
    {
        /**
         * Note: You must return deleted_at or the Attendance getActionButtonsAttribute won't
         * be able to differentiate what buttons to show for each row.
         */
        $dataTableQuery = $this->query()
            ->select('attendances.*');

        // active() is a scope on the AttendanceScope trait
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
                'attendances.id',
                'attendances.name',
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
            event(new AttendanceDeleted($subject));

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.attendances.delete_error'));
    }
}
