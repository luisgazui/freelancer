<?php

namespace FreelancerOnline\DataTables;

use FreelancerOnline\Models\user;
use Form;
use Yajra\Datatables\Services\DataTable;

class userDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('actions', function ($data) {
                            return '
                            ' . Form::open(['route' => ['register.destroy', $data->id], 'method' => 'delete']) . '
                            <div class=\'btn-group\'>
                                <a href="' . route('register.show', [$data->id]) . '" class=\'btn btn-default btn-xs\'><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="' . route('register.edit', [$data->id]) . '" class=\'btn btn-default btn-xs\'><i class="glyphicon glyphicon-edit"></i></a>
                                ' . Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'onclick' => "return confirm('Are you sure?')"
                            ]) . '
                            </div>
                            ' . Form::close() . '
                            ';
                        })
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $users = user::query();

        return $this->applyScopes($users);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns(array_merge(
                $this->getColumns(),
                [
                    'actions' => [
                        'orderable' => false,
                        'searchable' => false,
                        'printable' => false,
                        'exportable' => false
                    ]
                ]
            ))
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => true,
                'buttons' => [
                    'csv',
                    'excel',
                    'pdf',
                    'print',
                    'reset',
                    'reload'
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'name' => ['name' => 'name', 'data' => 'name'],
            'lastname' => ['name' => 'lastname', 'data' => 'lastname'],
            'documento_id' => ['name' => 'documento_id', 'data' => 'documento_id'],
            'documentoi' => ['name' => 'documentoi', 'data' => 'documentoi'],
            'email' => ['name' => 'email', 'data' => 'email'],
            'password' => ['name' => 'password', 'data' => 'password'],
            'tipousuario_id' => ['name' => 'tipousuario_id', 'data' => 'tipousuario_id'],
            'pais_id' => ['name' => 'pais_id', 'data' => 'pais_id'],
            'Direccion' => ['name' => 'Direccion', 'data' => 'Direccion']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'users';
    }
}
