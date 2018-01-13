<?php

namespace App\Http\Controllers\Backend\Session;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Session\FetchSessionsRequest;
use App\Repositories\Backend\Session\SessionRepository;

/**
 * Class SessionCalendarController.
 */
class SessionCalendarController extends Controller
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
     * @param FetchSessionsRequest $request
     *
     * @return mixed
     */
    public function __invoke(FetchSessionsRequest $request)
    {
        $timezone = $request->input('timezone');
        $start = $request->input('start', Carbon::now($timezone)->startOfMonth());
        $end = $request->input('end', Carbon::now($timezone)->endOfMonth());

        $sessions = $this->sessions->getBetween($start, $end);

        return $sessions->map(function($session, $key) {
            return [
                'id' => $session->id,
                'title' => $session->name,
                'start' => $session->start_time->toDateTimeString(),
                'end' => $session->end_time->toDateTimeString(),
                'url' => route('admin.sessions.edit', $session),
                'editable' => false,
            ];
        });
    }
}
