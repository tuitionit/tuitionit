<?php

namespace App\Http\Controllers\Backend\Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Session\SessionRepository;

/**
 * Class SessionListController.
 */
class SessionListController extends Controller
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
    public function __invoke(Request $request)
    {
        $sessionsQuery = $this->sessions->searchByName($request->input('name'));

        $sessions = $sessionsQuery->get();

        $list = $sessions->map(function ($session) {
            return ['id' => $session->id, 'text' => $session->name];
        });

        return $list->all();
    }
}
