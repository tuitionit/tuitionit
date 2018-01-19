<?php

namespace App\DataTables;

use App\Models\Attendance\Attendance;
use Yajra\DataTables\Services\DataTable;

class AttendancesDataTable extends DataTable
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
            ->editColumn('student.name', function($attendance) use($export) {
                return isset($attendance->student)
                    ? ($export ? $attendance->student->name : link_to_route('admin.students.show', $attendance->student->name, ['id' => $attendance->student_id]))
                    : '';
            })
            ->editColumn('session.name', function($attendance) use($export) {
                return isset($attendance->session)
                    ? ($export ? $attendance->session->name : link_to_route('admin.sessions.show', $attendance->session->name, ['id' => $attendance->session_id]))
                    : '';
            })
            /*->editColumn('batch.name', function($attendance) use($export) {
                return isset($attendance->batch)
                    ? ($export ? $attendance->batch->name : link_to_route('admin.batches.show', $attendance->batch->name, ['id' => $attendance->batch_id]))
                    : '';
            })*/
            ->addColumn('action', function(Attendance $attendance) {
                return $attendance->action_buttons;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Attendance\Attendance $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Attendance $model)
    {
        return $model->newQuery()
            ->with(['student', 'session'])
            ->select('attendances.*');
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
                'title' => trans('labels.backend.attendances.table.student'),
            ],
            'session.name' => [
                'title' => trans('labels.backend.attendances.table.session'),
            ],
            /*'batch.name' => [
                'title' => trans('labels.backend.attendances.table.batch'),
            ],*/
            'in_time' => [
                'title' => trans('labels.backend.attendances.table.in_time'),
            ],
            'out_time' => [
                'title' => trans('labels.backend.attendances.table.out_time'),
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
        return 'Attendance_' . date('YmdHis');
    }

    public function mark()
    {

    }
}
