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
            ->editColumn('name', function($batch) {
                return link_to_route('admin.batches.show', $batch->name, ['id' => $batch->id]);
            })
            ->editColumn('course', function($batch) {
                return isset($batch->course) ? link_to_route('admin.courses.show', $batch->course->name, ['id' => $batch->course_id]) : '-';
            })
            ->editColumn('location', function($batch) {
                return isset($batch->location) ? link_to_route('admin.locations.show', $batch->location->name, ['id' => $batch->location_id]) : '-';
            })
            ->editColumn('status', function ($batch) {
                return $batch->status_label;
            })
            ->addColumn('actions', function ($batch) {
                return $batch->action_buttons;
            })
            ->make(true);
    }
}
