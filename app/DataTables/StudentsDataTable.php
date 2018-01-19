<?php

namespace App\DataTables;

use App\Models\Student\Student;
use Yajra\DataTables\Services\DataTable;

class StudentsDataTable extends DataTable
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
        ->editColumn('index_number', function($student) use($export) {
            return $export ? $student->index_number : link_to_route('admin.students.show', $student->index_number, ['id' => $student->id]);
        })
        ->editColumn('name', function($student) use($export) {
            return $export ? $student->name : link_to_route('admin.students.show', $student->name, ['id' => $student->id]);
        })
        ->editColumn('parent.name', function($student) use($export) {
            return isset($student->parent)
                ? ($export ? $student->parent->name : link_to_route('admin.users.show', $student->parent->name, ['id' => $student->parent_id]))
                : ($export ? '' : link_to_route('admin.students.edit', trans('strings.backend.general.click_to_select'), ['id' => $student->id], ['class' => 'btn btn-xs btn-default']));
        })
        ->editColumn('status', function($student) use($export) {
            return $export ? $student->status_label : $student->status_html_label;
        })
        ->addColumn('action', function($student) {
            return $student->action_buttons;
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Student\Student $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Student $model)
    {
        return $model->newQuery()
            ->with(['user', 'parent'])
            ->select('students.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction([
                        'title' => trans('labels.general.actions'),
                        'width' => '80px',
                        'printable' => false,
                        'exportable' => false,
                    ])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'index_number' => [
                'title' => trans('labels.backend.students.table.index_number'),
            ],
            'name' => [
                'title' => trans('labels.backend.students.table.name'),
            ],
            'phone' => [
                'title' => trans('labels.backend.students.table.phone'),
            ],
            'created_at' => [
                'title' => trans('labels.backend.students.table.created'),
            ],
            'parent.name' => [
                'title' => trans('labels.backend.students.table.parent'),
            ],
            'status' => [
                'title' => trans('labels.backend.students.table.status'),
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
        return 'Student_' . date('YmdHis');
    }
}
