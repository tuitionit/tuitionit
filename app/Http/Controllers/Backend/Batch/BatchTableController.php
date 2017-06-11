<?php

namespace App\Http\Controllers\Backend\Batch;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Batch\BatchRepository;
use App\Http\Requests\Backend\Batch\ManageBatchRequest;

/**
 * Class BatchTableController.
 */
class BatchTableController extends Controller
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
    public function __invoke(ManageBatchRequest $request)
    {
        return Datatables::of($this->batches->getForDataTable($request->get('status')))
            ->escapeColumns(['name', 'description'])
            ->addColumn('actions', function ($batch) {
                return $batch->action_buttons;
            })
            ->make(true);
    }
}
