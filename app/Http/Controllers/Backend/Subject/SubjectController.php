<?php

namespace App\Http\Controllers\Backend\Subject;

use App\Models\Subject\Subject;
use App\Repositories\Backend\Subject\SubjectRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Subject\ManageSubjectRequest;
use App\Http\Requests\Backend\Subject\StoreSubjectRequest;

class SubjectController extends Controller
{
    /**
     * @var SubjectRepository
     */
    protected $subjects;

    /**
     * @param UserRepository $users
     * @param RoleRepository $roles
     */
    public function __construct(SubjectRepository $subjects)
    {
        $this->subjects = $subjects;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageSubjectRequest $request)
    {
        return view('backend.subject.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Subject\StoreSubjectRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectRequest $request)
    {
        $subject = Subject::create($request->all());

        return redirect()->route('admin.subjects.index')->withFlashSuccess(trans('alerts.backend.subjects.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return view('backend.subject.show')->withSubject($subject);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        return view('backend.subject.edit')->withSubject($subject);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Subject\StoreSubjectRequest  $request
     * @param  \App\Models\Subject\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSubjectRequest $request, Subject $subject)
    {
        $subject->update($request->all());
        return redirect()->route('admin.subjects.index')->withFlashSuccess(trans('alerts.backend.subjects.updated'));
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
     * @param Subject $subject
     * @param $status
     * @param ManageSubjectRequest $request
     *
     * @return mixed
     */
    public function mark(Subject $subject, $status, ManageSubjectRequest $request)
    {
        $subject->update(['status' => $status]);

        return redirect()->route('admin.subjects.index')->withFlashSuccess(trans('alerts.backend.subjects.updated'));
    }
}
