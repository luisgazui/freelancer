<?php

namespace FreelancerOnline\DataTables;

use FreelancerOnline\Models\TblDocumentos;
use Form;
use Yajra\Datatables\Services\DataTable;
use DB;

class TblDocumentosDataTable extends DataTable
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
                            ' . Form::open(['route' => ['tblDocumentos.destroy', $data->id], 'method' => 'delete']) . '
                            <div class=\'btn-group\'>
                                <a href="' . route('tblDocumentos.edit', [$data->id]) . '" class=\'btn btn-default btn-xs\'><i class="glyphicon glyphicon-edit"></i></a>
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
        $tblDocumentos = TblDocumentos::join('tbl_paises',
            'tbl_paises.id','=','tbl_documentos.pais_id')
            ->select('tbl_documentos.id','tbl_documentos.Documento as Documento', 
                'tbl_paises.Nombre as pais', DB::raw("IF(tbl_documentos.Empresa = 0, 'Particular','Empresa') as Empresa") );

        return $this->applyScopes($tblDocumentos);
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
            'Documento' => ['name' => 'Documento', 'data' => 'Documento'],
            'Pais' => ['name' => 'pais', 'data' => 'pais'],
            'Empresa' => ['name' => 'Empresa', 'data' => 'Empresa']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'tblDocumentos';
    }
}
