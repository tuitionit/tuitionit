<?php

namespace App\DataTables;

use App\Models\Assignment\Assignment;
use Yajra\DataTables\Services\DataTable;

class AssignmentsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $export = $this->request->get('action', null) != null;
        return datatables($query)
            ->rawColumns(['status', 'action'])
            ->editColumn('student.name', function ($assignment) use ($export) {
                return isset($assignment->student)
                    ? ($export ? $assignment->student->name : link_to_route('admin.students.show', $assignment->student->name, [$assignment->student_id]))
                    : '';
            })
            ->editColumn('session.name', function ($assignment) use ($export) {
                return isset($assignment->session)
                    ? ($export ? $assignment->session->name : link_to_route('admin.sessions.show', $assignment->session->name, [$assignment->session_id]))
                    : '';
            })
            /*->editColumn('batch.name', function($assignment) use($export) {
                return isset($assignment->batch)
                    ? ($export ? $assignment->batch->name : link_to_route('admin.batches.show', $assignment->batch->name, ['id' => $assignment->batch_id]))
                    : '';
            })*/
            ->addColumn('action', function (Assignment $assignment) {
                return $assignment->action_buttons;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Assignment\Assignment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Assignment $model)
    {
        return $model->newQuery()
            ->with(['student', 'session'])
            ->select('assignments.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $params = $this->getBuilderParameters();
        unset($params['buttons'][array_search('create', $params['buttons'])]);
        array_unshift($params['buttons'], 'mark');
        // dd($params);
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction([
                        'title' => trans('labels.general.actions'),
                        'width' => '80px',
                        'printable' => false,
                        'exportable' => false,
                    ])
                    ->parameters($params);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'student.name' => [
                'title' => trans('labels.backend.assignments.table.student'),
            ],
            'session.name' => [
                'title' => trans('labels.backend.assignments.table.session'),
            ],
            /*'batch.name' => [
                'title' => trans('labels.backend.assignments.table.batch'),
            ],*/
            'in_time' => [
                'title' => trans('labels.backend.assignments.table.in_time'),
            ],
            'out_time' => [
                'title' => trans('labels.backend.assignments.table.out_time'),
            ]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Assignment_' . date('YmdHis');
    }

    public function mark()
    {
    }
}
