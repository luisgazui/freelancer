<?php

namespace FreelancerOnline\DataTables;

use FreelancerOnline\Models\TblMonedas;
use Form;
use Yajra\Datatables\Services\DataTable;

class TblMonedasDataTable extends DataTable
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
                            ' . Form::open(['route' => ['tblMonedas.destroy', $data->id], 'method' => 'delete']) . '
                            <div class=\'btn-group\'>
                                <a href="' . route('tblMonedas.show', [$data->id]) . '" class=\'btn btn-default btn-xs\'><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="' . route('tblMonedas.edit', [$data->id]) . '" class=\'btn btn-default btn-xs\'><i class="glyphicon glyphicon-edit"></i></a>
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
        $tblMonedas = TblMonedas::query();

        return $this->applyScopes($tblMonedas);
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
            'Nombre' => ['name' => 'Nombre', 'data' => 'Nombre'],
            'simbolo' => ['name' => 'simbolo', 'data' => 'simbolo'],
            'pais_id' => ['name' => 'pais_id', 'data' => 'pais_id']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'tblMonedas';
    }
}
