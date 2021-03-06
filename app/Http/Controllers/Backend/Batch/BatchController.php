<?php

namespace App\Http\Controllers\Backend\Batch;

use Carbon\Carbon as Carbon;
use App\DataTables\BatchesDataTable;
use App\Models\Batch\Batch;
use App\Models\Course\Course;
use App\Models\Location\Location;
use App\Models\Subject\Subject;
use App\Repositories\Backend\Batch\BatchRepository;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Backend\Batch\Traits\BatchStudents;
use App\Http\Requests\Backend\Batch\ManageBatchRequest;
use App\Http\Requests\Backend\Batch\StoreBatchRequest;

class BatchController extends Controller
{
    use BatchStudents;

    /**
     * @var BatchRepository
     */
    protected $batches;

    /**
     * @param UserRepository $users
     * @param RoleRepository $roles
     */
    public function __construct(BatchRepository $batches)
    {
        $this->batches = $batches;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageBatchRequest $request, BatchesDataTable $dataTable)
    {
        return $dataTable->render('backend.batch.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $batch = new Batch();

        $locations = Location::all()->pluck('name', 'id');
        $courses = Course::all()->pluck('name', 'id');
        $subjects = Subject::all()->pluck('name', 'id');

        return view('backend.batch.create')->with(compact('locations', 'courses', 'subjects', 'batch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Batch\StoreBatchRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBatchRequest $request)
    {
        $data = $request->all();
        // $data['start_date'] = Carbon::createFromFormat('d/m/Y', $data['start_date']);
        // $data['end_date'] = Carbon::createFromFormat('d/m/Y', $data['end_date']);
        $batch = Batch::create($data);

        return redirect()->route('admin.batches.index')->withFlashSuccess(trans('alerts.backend.batches.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Batch\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Batch $batch)
    {
        return view('backend.batch.show')->withBatch($batch);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Batch\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit(Batch $batch)
    {
        $locations = Location::all()->pluck('name', 'id');
        $courses = Course::all()->pluck('name', 'id');
        $subjects = Subject::all()->pluck('name', 'id');

        return view('backend.batch.edit')->with(compact('locations', 'courses', 'subjects', 'batch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Batch\StoreBatchRequest  $request
     * @param  \App\Models\Batch\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBatchRequest $request, Batch $batch)
    {
        $batch->update($request->all());
        return redirect()->route('admin.batches.index')->withFlashSuccess(trans('alerts.backend.batches.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Requests\Backend\Batch\ManageBatchRequest $request
     * @param  \App\Models\Batch\Batch $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManageBatchRequest $request, Batch $batch)
    {
        $this->batches->delete($batch);
        return redirect()->route('admin.batches.index')->withFlashSuccess(trans('alerts.backend.batches.deleted'));
    }

    /**
     * @param Batch $batch
     * @param $status
     * @param ManageBatchRequest $request
     *
     * @return mixed
     */
    public function mark(Batch $batch, $status, ManageBatchRequest $request)
    {
        $batch->update(['status' => $status]);

        return redirect()->route('admin.batches.index')->withFlashSuccess(trans('alerts.backend.batches.updated'));
    }
}
