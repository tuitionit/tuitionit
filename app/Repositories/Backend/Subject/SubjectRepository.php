<?php

namespace App\Repositories\Backend\Subject;

use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Subject\SubjectCreated;
use App\Events\Backend\Subject\SubjectDeleted;
use App\Events\Backend\Subject\SubjectUpdated;
use App\Repositories\BaseRepository;
use App\Models\Subject\Subject;

/**
 * Class SubjectRepository
 * @package App\Repositories\Backend\Subject
 */
class SubjectRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Subject::class;

    /**
     * @param int  $status
     *
     * @return mixed
     */
    public function getForDataTable($status = 1)
    {
        /**
         * Note: You must return deleted_at or the Subject getActionButtonsAttribute won't
         * be able to differentiate what buttons to show for each row.
         */
        $dataTableQuery = $this->query()
            ->select([
                'subjects.id',
                'subjects.name',
                'subjects.description',
                'subjects.status',
                'subjects.created_at',
                'subjects.updated_at',
                'subjects.deleted_at',
            ]);

        // active() is a scope on the SubjectScope trait
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
                'subjects.id',
                'subjects.name',
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
            event(new SubjectDeleted($subject));

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.subjects.delete_error'));
    }
}
