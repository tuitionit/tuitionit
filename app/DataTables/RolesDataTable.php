<?php

namespace App\DataTables;

use App\Models\Access\Role\Role;
use Yajra\DataTables\Services\DataTable;

class RolesDataTable extends DataTable
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
            ->rawColumns(['permissions', 'status', 'action'])
            ->editColumn('name', function($role) use($export) {
                return $export ? $role->name : link_to_route('admin.access.role.edit', $role->name, ['id' => $role->id]);
            })
            ->editColumn('permissions', function($role) use($export) {
                if ($role->all) {
                    return $export
                        ? trans('labels.general.all')
                        : '<span class="label label-success">'.trans('labels.general.all').'</span>';
                }
                $permissions = $role->permissions->pluck('display_name')->toArray();
                return $role->permissions->count()
                    ? ($export ? implode(' / ', $permissions) : implode('<br/>', $permissions))
                    : ($export ? trans('labels.general.none') : '<span class="label label-danger">'.trans('labels.general.none').'</span>');
            })
            ->editColumn('users', function($role) use($export) {
                return $role->users->count();
            })
            ->editColumn('sort', function($role) use($export) {
                return $role->sort;
            })
            ->addColumn('action', function($role) {
                return $role->action_buttons;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Access\Role\Role $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Role $model)
    {
        return $model->newQuery()
            ->with(['permissions', 'users'])
            ->select(config('access.roles_table') . '.*');
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
                    ->addAction(['width' => '80px'])
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
                'title' => trans('labels.backend.access.roles.table.role'),
            ],
            'permissions' => [
                'title' => trans('labels.backend.access.roles.table.permissions'),
            ],
            'users' => [
                'title' => trans('labels.backend.access.roles.table.number_of_users'),
            ],
            'sort' => [
                'title' => trans('labels.backend.access.roles.table.sort'),
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
        return 'Role_' . date('YmdHis');
    }
}
