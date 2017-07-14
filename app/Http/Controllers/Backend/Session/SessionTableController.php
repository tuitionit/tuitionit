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
            ->editColumn('name', function($batch) {
                return link_to_route('admin.batches.show', $batch->name, ['id' => $batch->id]);
            })
            ->addColumn('location', function($session) {
                return link_to_route('admin.locations.show', $session->location->name, ['id' => $session->location_id]);
            })
            ->addColumn('actions', function ($session) {
                return $session->action_buttons;
            })
            ->make(true);
    }
}
