<?php

namespace App\DataTables;

use App\Models\Course\Course;
use Yajra\DataTables\Services\DataTable;

class CoursesDataTable extends DataTable
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
            ->editColumn('name', function ($course) use ($export) {
                return $export ? $course->name : link_to_route('admin.courses.edit', $course->name, [$course->id]);
            })
            ->editColumn('parent.name', function ($student) use ($export) {
                return isset($student->parent)
                    ? ($export ? $student->parent->name : link_to_route('admin.users.show', $student->parent->name, [$student->parent_id]))
                    : ($export ? '' : link_to_route('admin.students.edit', trans('strings.backend.general.click_to_select'), [$student->id], ['class' => 'btn btn-xs btn-default']));
            })
            ->editColumn('status', function ($course) use ($export) {
                return $export ? $course->status_label : $course->status_html_label;
            })
            ->addColumn('action', function ($course) {
                return $course->action_buttons;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Course\Course $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Course $model)
    {
        return $model->newQuery()
            ->select('courses.*');
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
                'title' => trans('labels.backend.courses.table.name'),
            ],
            'description' => [
                'title' => trans('labels.backend.courses.table.description'),
            ],
            'status' => [
                'title' => trans('labels.backend.courses.table.status'),
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
        return 'Course_' . date('YmdHis');
    }
}
