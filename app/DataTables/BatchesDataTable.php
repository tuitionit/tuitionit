<?php

namespace App\DataTables;

use App\Models\Batch\Batch;
use Yajra\DataTables\Services\DataTable;

class BatchesDataTable extends DataTable
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
            ->editColumn('name', function($batch) use($export) {
                return $export ? $batch->name : link_to_route('admin.batches.show', $batch->name, ['id' => $batch->id]);
            })
            ->editColumn('type', function($batch) {
                return $batch->getTypeLabel();
            })
            ->editColumn('course.name', function($batch) use($export) {
                return isset($batch->course)
                    ? ($export ? $batch->course->name : link_to_route('admin.batches.show', $batch->course->name, ['id' => $batch->course_id]))
                    : ($export ? '' : link_to_route('admin.batches.edit', trans('strings.backend.general.click_to_select'), ['id' => $batch->id], ['class' => 'btn btn-xs btn-default']));
            })
            ->editColumn('location.name', function($batch) use($export) {
                return isset($batch->location)
                    ? ($export ? $batch->location->name : link_to_route('admin.batches.show', $batch->location->name, ['id' => $batch->location_id]))
                    : ($export ? '' : link_to_route('admin.locations.edit', trans('strings.backend.general.click_to_select'), ['id' => $batch->id], ['class' => 'btn btn-xs btn-default']));
            })
            ->editColumn('status', function($batch) use($export) {
                return $export ? $batch->status_label : $batch->status_html_label;
            })
            ->addColumn('action', function($batch) {
                return $batch->action_buttons;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Batch\Batch $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Batch $model)
    {
        return $model->newQuery()
            ->with(['course', 'location'])
            ->select('batches.*');
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
                'title' => trans('labels.backend.batches.table.name'),
            ],
            'type' => [
                'title' => trans('labels.backend.batches.table.type'),
            ],
            'course.name' => [
                'title' => trans('labels.backend.batches.table.course'),
            ],
            'location.name' => [
                'title' => trans('labels.backend.batches.table.location'),
            ],
            'start_date' => [
                'title' => trans('labels.backend.batches.table.start_date'),
            ],
            'end_date' => [
                'title' => trans('labels.backend.batches.table.end_date'),
            ],
            'status' => [
                'title' => trans('labels.backend.batches.table.status'),
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
        return 'Batches_' . date('YmdHis');
    }
}
