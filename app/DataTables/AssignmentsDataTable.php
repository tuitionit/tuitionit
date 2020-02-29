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
            ->editColumn('name', function ($assignment) use ($export) {
                return $export ? $assignment->name : link_to_route('admin.assignments.show', $assignment->name, [$assignment->id]);
            })
            ->editColumn('type', function ($assignment) {
                return $assignment->getTypeLabel();
            })
            ->editColumn('course_id', function ($assignment) {
                return $assignment->relationLoaded('course') ? $assignment->course->name : null;
            })
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
            ->with(['subject', 'course'])
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
            'name' => [
                'title' => trans('labels.backend.assignments.table.name'),
            ],
            'type' => [
                'title' => trans('labels.backend.assignments.table.type'),
            ],
            'start_time' => [
                'title' => trans('labels.backend.assignments.table.start'),
            ],
            'end_time' => [
                'title' => trans('labels.backend.assignments.table.end'),
            ],
            'course.name' => [
                'title' => trans('labels.backend.assignments.table.course'),
            ],
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
