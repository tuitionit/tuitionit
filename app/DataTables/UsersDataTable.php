<?php

namespace App\DataTables;

use App\Models\Access\User\User;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
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
        ->rawColumns(['confirmed', 'roles', 'status', 'action'])
        ->editColumn('id', function ($user) use ($export) {
            return $export ? $user->id : link_to_route('admin.users.show', $user->id, ['id' => $user->id]);
        })
        ->editColumn('name', function ($user) use ($export) {
            return $export ? $user->name : link_to_route('admin.users.show', $user->name, ['id' => $user->id]);
        })
        ->editColumn('parent.name', function ($user) use ($export) {
            return isset($user->parent)
                ? ($export ? $user->parent->name : link_to_route('admin.users.show', $user->parent->name, ['id' => $user->parent_id]))
                : ($export ? '' : link_to_route('admin.users.edit', trans('strings.backend.general.click_to_select'), ['id' => $user->id], ['class' => 'btn btn-xs btn-default']));
        })
        ->editColumn('confirmed', function ($user) use ($export) {
            return $export ? $user->confirmed_label : $user->confirmed_html_label;
        })
        ->editColumn('roles', function ($user) use ($export) {
            $roles = $user->roles->pluck('name')->toArray();
            return $user->roles->count()
                ? ($export ? implode(' / ', $roles) : implode('<br/>', $roles))
                : ($export ? trans('labels.general.none') : link_to_route('admin.users.edit', trans('strings.backend.general.click_to_select'), ['id' => $user->id], ['class' => 'btn btn-xs btn-default']));
        })
        ->addColumn('action', function ($user) {
            return $user->action_buttons;
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()
            ->with(['roles'])
            ->select(config('access.users_table') . '.*');
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
                        'width' => '171px',
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
            'id' => [
                'title' => trans('labels.backend.access.users.table.id'),
            ],
            'name' => [
                'title' => trans('labels.backend.access.users.table.name'),
            ],
            'email' => [
                'title' => trans('labels.backend.access.users.table.email'),
            ],
            'confirmed' => [
                'title' => trans('labels.backend.access.users.table.confirmed'),
            ],
            'roles' => [
                'title' => trans('labels.backend.access.users.table.roles'),
            ],
            'created_at' => [
                'title' => trans('labels.backend.access.users.table.created'),
            ],
            'updated_at' => [
                'title' => trans('labels.backend.access.users.table.last_updated'),
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
        return 'Users_' . date('YmdHis');
    }
}
