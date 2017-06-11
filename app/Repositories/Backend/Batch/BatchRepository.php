<?php

namespace App\Repositories\Backend\Batch;

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
            ->select([
                'batches.id',
                'batches.name',
                'batches.description',
                'batches.status',
                'batches.created_at',
                'batches.updated_at',
                'batches.deleted_at',
            ]);

        // active() is a scope on the UserScope trait
        return $dataTableQuery;
    }
}
