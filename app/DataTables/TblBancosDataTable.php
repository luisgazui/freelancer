<?php

namespace FreelancerOnline\DataTables;

use FreelancerOnline\Models\TblBancos;
use Form;
use Yajra\Datatables\Services\DataTable;

class TblBancosDataTable extends DataTable
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
                            ' . Form::open(['route' => ['tblBancos.destroy', $data->id], 'method' => 'delete']) . '
                            <div class=\'btn-group\'>
                                
                                <a href="' . route('tblBancos.edit', [$data->id]) . '" class=\'btn btn-default btn-xs\'><i class="glyphicon glyphicon-edit"></i></a>
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
        $tblBancos = TblBancos::join('tbl_paises',
            'tbl_paises.id','=','tbl_bancos.pais_id')
            ->select('tbl_bancos.id','tbl_bancos.NombreB as nombrebanco', 
                'tbl_paises.Nombre as pais');


        return $this->applyScopes($tblBancos);
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
                    'excel',
                    'pdf',
                    'print',
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
            'Nombre' => ['name' => 'nombrebanco', 'data' => 'nombrebanco'],
            'Pais' => ['name' => 'pais', 'data' => 'pais']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'tblBancos';
    }
}
