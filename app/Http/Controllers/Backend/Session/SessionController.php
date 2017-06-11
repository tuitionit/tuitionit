<?php

namespace App\Http\Controllers\Backend\Session;

use App\Models\Session\Session;
use App\Repositories\Backend\Session\SessionRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Session\ManageSessionRequest;
use App\Http\Requests\Backend\Session\StoreSessionRequest;

class SessionController extends Controller
{
    /**
     * @var SessionRepository
     */
    protected $sessions;

    /**
     * @param UserRepository $users
     * @param RoleRepository $roles
     */
    public function __construct(SessionRepository $sessions)
    {
        $this->sessions = $sessions;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageSessionRequest $request)
    {
        return view('backend.session.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.session.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Session\StoreSessionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSessionRequest $request)
    {
        $session = Session::create($request->all());

        return redirect()->route('admin.sessions.index')->withFlashSuccess(trans('alerts.backend.sessions.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        return view('backend.session.show')->withSession($session);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        return view('backend.session.edit')->withSession($session);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Session\StoreSessionRequest  $request
     * @param  \App\Models\Session\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSessionRequest $request, Session $session)
    {
        $session->update($request->all());
        return redirect()->route('admin.sessions.index')->withFlashSuccess(trans('alerts.backend.sessions.updated'));
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
     * @param Session $session
     * @param $status
     * @param ManageSessionRequest $request
     *
     * @return mixed
     */
    public function mark(Session $session, $status, ManageSessionRequest $request)
    {
        $session->update(['status' => $status]);

        return redirect()->route('admin.sessions.index')->withFlashSuccess(trans('alerts.backend.sessions.updated'));
    }
}
