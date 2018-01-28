<?php

namespace App\Http\Controllers\Backend\Session;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Session\SessionRepository;
use App\Http\Requests\Backend\Session\ManageSessionRequest;

/**
 * Class SessionTableController.
 */
class SessionTableController extends Controller
{
    /**
     * @var SessionRepository
     */
    protected $sessions;

    /**
     * @param SessionRepository $sessions
     */
    public function __construct(SessionRepository $sessions)
    {
        $this->sessions = $sessions;
    }

    /**
     * @param ManageSessionRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSessionRequest $request)
    {
        return Datatables::of($this->sessions->getForDataTable($request->get('status')))
            ->escapeColumns(['name', 'description'])
            ->editColumn('name', function ($session) {
                return link_to_route('admin.sessions.show', $session->name, ['id' => $session->id]);
            })
            ->addColumn('teacher', function ($session) {
                return isset($session->teacher) ?
                    link_to_route(
                        'admin.teachers.show',
                        $session->teacher->name,
                        ['id' => $session->teacher_id]
                    ) :
                    link_to_route(
                        'admin.sessions.edit',
                        trans('strings.backend.general.click_to_select'),
                        ['id' => $session->id]
                    );
            })
            ->addColumn('location', function ($session) {
                return link_to_route('admin.locations.show', $session->location->name, ['id' => $session->location_id]);
            })
            ->addColumn('actions', function ($session) {
                return $session->action_buttons;
            })
            ->make(true);
    }
}
