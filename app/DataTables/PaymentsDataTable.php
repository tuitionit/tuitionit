<?php

namespace App\DataTables;

use App\Models\Payment\Payment;
use Yajra\DataTables\Services\DataTable;

class PaymentsDataTable extends DataTable
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
            ->editColumn('student.name', function($payment) use($export) {
                return isset($payment->student)
                    ? ($export ? $payment->student->name : link_to_route('admin.students.show', $payment->student->name, ['id' => $payment->student_id]))
                    : ($export ? '' : link_to_route('admin.payments.edit', trans('strings.backend.general.click_to_select'), ['id' => $payment->id], ['class' => 'btn btn-xs btn-default']));
            })
            ->editColumn('type', function($payment) {
                return $payment->getTypeLabel();
            })
            ->editColumn('batch.name', function($payment) use($export) {
                return isset($payment->batch)
                    ? ($export ? $payment->batch->name : link_to_route('admin.batches.show', $payment->batch->name, ['id' => $payment->batch_id]))
                    : ($export ? '' : link_to_route('admin.payments.edit', trans('strings.backend.general.click_to_select'), ['id' => $payment->id], ['class' => 'btn btn-xs btn-default']));
            })
            ->editColumn('payee.name', function($payment) use($export) {
                return isset($payment->payee)
                    ? ($export ? $payment->payee->name : link_to_route('admin.users.show', $payment->payee->name, ['id' => $payment->paid_to]))
                    : ($export ? '' : link_to_route('admin.payments.edit', trans('strings.backend.general.click_to_select'), ['id' => $payment->id], ['class' => 'btn btn-xs btn-default']));
            })
            ->addColumn('action', function(Payment $payment) {
                return $payment->action_buttons;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Payment\Payment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Payment $model)
    {
        return $model->newQuery()
            ->with(['student', 'batch', 'payee'])
            ->select('payments.*');
            // ->join('students', 'payments.student_id', '=', 'students.id');
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
                    ->addAction(['width' => '80px', 'printable' => false, 'exportable' => false])
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
            // 'id',
            'student.name',
            'amount',
            'type',
            'batch.name',
            'payee.name',
            'paid_at',
            // 'created_at',
            // 'updated_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Payments_' . date('YmdHis');
    }
}
