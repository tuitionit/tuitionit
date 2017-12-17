<?php

namespace App\Http\Controllers\Backend;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Payment\PaymentRepository;

/**
 * Class ChartController.
 */
class ChartController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function paymentsOverYear(Request $request, PaymentRepository $payments)
    {
        $this->validate($request, [
            'year' => 'sometimes|required|digits:4|integer|min:2000|max:' . (date('Y') + 1),
        ]);

        $data = $request->all();

        if(empty($data['year'])) {
            $data['year'] = date('Y');
        }

        $output = [
            'year' => $data['year'],
            'labels' => [
                trans('labels.general.months.january'),
                trans('labels.general.months.february'),
                trans('labels.general.months.march'),
                trans('labels.general.months.april'),
                trans('labels.general.months.may'),
                trans('labels.general.months.june'),
                trans('labels.general.months.july'),
                trans('labels.general.months.august'),
                trans('labels.general.months.september'),
                trans('labels.general.months.october'),
                trans('labels.general.months.november'),
                trans('labels.general.months.december'),
            ],
            'data' => array_fill(1, 12, '0.00'),
        ];

        $earnings = $payments->query()
            ->select(DB::raw('SUM(`amount`) as amount'), DB::raw('MONTH(`paid_at`) AS `paid_month`'))
            ->whereBetween('paid_at', [$data['year'] . '-01-01 00:00:00', $data['year'] . '-12-31 23:59:59'])
            ->groupBy('paid_month')
            ->get();
        if(!empty($earnings)) {
            foreach ($earnings as $earning) {
                $output['data'][$earning->paid_month] = $earning->amount;
            }
        }

        dd($output['data']);

        return $output;
    }
}
