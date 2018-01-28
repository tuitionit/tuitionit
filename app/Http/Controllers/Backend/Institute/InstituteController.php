<?php

namespace App\Http\Controllers\Backend\Institute;

use App\Models\Institute\Institute;
use App\Models\Location\Location;
use App\Models\Subject\Subject;
use App\Repositories\Backend\Institute\InstituteRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Institute\ManageInstituteRequest;
use App\Http\Requests\Backend\Institute\StoreInstituteRequest;

class InstituteController extends Controller
{
    /**
     * @var InstituteRepository
     */
    protected $institutes;

    /**
     * @param UserRepository $users
     * @param RoleRepository $roles
     */
    public function __construct(InstituteRepository $institutes)
    {
        $this->institutes = $institutes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageInstituteRequest $request)
    {
        return view('backend.institute.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.institute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Institute\StoreInstituteRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstituteRequest $request)
    {
        $institute = Institute::create($request->all());

        return redirect()->route('admin.institutes.index')->withFlashSuccess(trans('alerts.backend.institutes.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Institute\Institute  $institute
     * @return \Illuminate\Http\Response
     */
    public function show(Institute $institute)
    {
        return view('backend.institute.show')->withInstitute($institute);
    }

    /**
     * Display the institute of the currently logged in user.
     *
     * @return \Illuminate\Http\Response
     */
    public function overview()
    {
        return view('backend.institute.show')->with([
            'institute' => session('tenant'),
            'locations' => Location::all(),
            'subjects' => Subject::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Institute\Institute  $institute
     * @return \Illuminate\Http\Response
     */
    public function edit(Institute $institute)
    {
        if (!access()->allow('manage-institutes') && access()->user()->can('update', access()->user()->institute)) {
            $institute = access()->user()->institute;
        }

        return view('backend.institute.edit')->withInstitute($institute);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Institute\StoreInstituteRequest  $request
     * @param  \App\Models\Institute\Institute  $institute
     * @return \Illuminate\Http\Response
     */
    public function update(StoreInstituteRequest $request, Institute $institute)
    {
        $institute->update($request->all());
        return redirect()->route('admin.institutes.index')->withFlashSuccess(trans('alerts.backend.institutes.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Institute $institute
     * @param $status
     * @param ManageInstituteRequest $request
     *
     * @return mixed
     */
    public function mark(Institute $institute, $status, ManageInstituteRequest $request)
    {
        $institute->update(['status' => $status]);

        return redirect()->route('admin.institutes.index')->withFlashSuccess(trans('alerts.backend.institutes.updated'));
    }
}
