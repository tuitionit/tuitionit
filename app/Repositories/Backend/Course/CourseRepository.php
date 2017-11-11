<?php

namespace App\Repositories\Backend\Course;


use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Course\CourseCreated;
use App\Events\Backend\Course\CourseDeleted;
use App\Events\Backend\Course\CourseUpdated;
use App\Repositories\BaseRepository;
use App\Models\Course\Course;

/**
 * Class CourseRepository
 * @package App\Repositories\Backend\Course
 */
class CourseRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Course::class;

    /**
     * @param int  $status
     *
     * @return mixed
     */
    public function getForDataTable($status = 1)
    {
        /**
         * Note: You must return deleted_at or the User getActionButtonsAttribute won't
         * be able to differentiate what buttons to show for each row.
         */
        $dataTableQuery = $this->query()
            ->select([
                'courses.id',
                'courses.name',
                'courses.description',
                'courses.status',
                'courses.created_at',
                'courses.updated_at',
                'courses.deleted_at',
            ]);

        // active() is a scope on the UserScope trait
        return $dataTableQuery;
    }

    /**
     * @param Model $course
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $course)
    {
        if ($course->delete()) {
            event(new CourseDeleted($course));

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.courses.delete_error'));
    }
}
