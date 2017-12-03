<?php

namespace App\Http\Controllers\Backend\Batch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Batch\BatchRepository;

/**
 * Class BatchListController.
 */
class BatchListController extends Controller
{
    /**
     * @var BatchRepository
     */
    protected $batches;

    /**
     * @param BatchRepository $batches
     */
    public function __construct(BatchRepository $batches)
    {
        $this->batches = $batches;
    }

    /**
     * @param ManageBatchRequest $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $batchesQuery = $this->batches->searchByName($request->input('name'));

        $batches = $batchesQuery->get();

        $list = $batches->map(function($batch) {
            return ['id' => $batch->id, 'text' => $batch->name];
        });

        return $list->all();
    }
}
