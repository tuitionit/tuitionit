<?php

namespace App\DataTables;

use App\Models\Teacher\Teacher;
use Yajra\DataTables\Services\DataTable;

class TeachersDataTable extends DataTable
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
            ->editColumn('name', function ($teacher) use ($export) {
                return $export ? $teacher->name : link_to_route('admin.teachers.edit', $teacher->name, ['id' => $teacher->id]);
            })
            ->editColumn('short_name', function ($teacher) use ($export) {
                return $export ? $teacher->short_name : link_to_route('admin.teachers.edit', $teacher->short_name, ['id' => $teacher->id]);
            })
            ->editColumn('status', function ($teacher) use ($export) {
                return $export ? $teacher->status_label : $teacher->status_html_label;
            })
            ->addColumn('action', function ($teacher) {
                return $teacher->action_buttons;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Teacher\Teacher $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Teacher $model)
    {
        return $model->newQuery()
            ->with(['user'])
            ->select('teachers.*');
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
            'name' => [
                'title' => trans('labels.backend.teachers.table.name'),
            ],
            'short_name' => [
                'title' => trans('labels.backend.teachers.table.short_name'),
            ],
            'status' => [
                'title' => trans('labels.backend.teachers.table.status'),
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
        return 'Teachers_' . date('YmdHis');
    }
}
