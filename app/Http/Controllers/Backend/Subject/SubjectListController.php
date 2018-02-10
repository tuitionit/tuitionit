<?php

namespace App\Http\Controllers\Backend\Subject;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Subject\SubjectRepository;

/**
 * Class SubjectListController.
 */
class SubjectListController extends Controller
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
    public function __invoke(Request $request)
    {
        $subjectsQuery = $this->subjects->searchByName($request->input('name'));

        if (!access()->allow('manage-institutes')) {
            $subjectsQuery->where('institute_id', '=', access()->user()->institute_id);
        }

        $subjects = $subjectsQuery->get();

        $list = $subjects->map(function ($subject) {
            return ['id' => $subject->id, 'text' => $subject->name];
        });

        return $list->all();
    }
}
