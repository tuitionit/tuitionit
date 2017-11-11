<?php

namespace App\Repositories\Backend\Batch;

use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Batch\BatchCreated;
use App\Events\Backend\Batch\BatchDeleted;
use App\Events\Backend\Batch\BatchUpdated;
use App\Repositories\BaseRepository;
use App\Models\Batch\Batch;

/**
 * Class BatchRepository
 * @package App\Repositories\Backend\Batch
 */
class BatchRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Batch::class;

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
            ->select('batches.*');

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
            event(new BatchDeleted($course));

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.batches.delete_error'));
    }
}
