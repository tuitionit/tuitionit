<?php

namespace App\Http\Controllers\Backend\Institute;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Institute\InstituteRepository;
use App\Http\Requests\Backend\Institute\ManageInstituteRequest;

/**
 * Class InstituteTableController.
 */
class InstituteTableController extends Controller
{
    /**
     * @var InstituteRepository
     */
    protected $institutes;

    /**
     * @param InstituteRepository $institutes
     */
    public function __construct(InstituteRepository $institutes)
    {
        $this->institutes = $institutes;
    }

    /**
     * @param ManageInstituteRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageInstituteRequest $request)
    {
        return Datatables::of($this->institutes->getForDataTable($request->get('status')))
            ->escapeColumns(['name', 'email'])
            ->addColumn('actions', function ($institute) {
                return $institute->action_buttons;
            })
            ->make(true);
    }
}
