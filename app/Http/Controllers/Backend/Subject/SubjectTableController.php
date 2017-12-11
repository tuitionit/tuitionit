<?php

namespace App\Http\Controllers\Backend\Subject;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Subject\SubjectRepository;
use App\Http\Requests\Backend\Subject\ManageSubjectRequest;

/**
 * Class SubjectTableController.
 */
class SubjectTableController extends Controller
{
    /**
     * @var SubjectRepository
     */
    protected $subjects;

    /**
     * @param SubjectRepository $subjects
     */
    public function __construct(SubjectRepository $subjects)
    {
        $this->subjects = $subjects;
    }

    /**
     * @param ManageSubjectRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSubjectRequest $request)
    {
        return Datatables::of($this->subjects->getForDataTable($request->get('status')))
            ->escapeColumns(['name', 'description'])
            ->editColumn('name', function($subject) {
                return link_to_route('admin.subjects.edit', $subject->name, ['id' => $subject->id]);
            })
            ->editColumn('status', function ($user) {
                return $user->status_label;
            })
            ->addColumn('actions', function ($subject) {
                return $subject->action_buttons;
            })
            ->make(true);
    }
}
