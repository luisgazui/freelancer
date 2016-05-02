<?php

namespace FreelancerOnline\DataTables;

use FreelancerOnline\Models\TblMascara;
use Form;
use Yajra\Datatables\Services\DataTable;

class TblMascaraDataTable extends DataTable
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
                            ' . Form::open(['route' => ['tblMascaras.destroy', $data->id], 'method' => 'delete']) . '
                            <div class=\'btn-group\'>
                                <a href="' . route('tblMascaras.show', [$data->id]) . '" class=\'btn btn-default btn-xs\'><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="' . route('tblMascaras.edit', [$data->id]) . '" class=\'btn btn-default btn-xs\'><i class="glyphicon glyphicon-edit"></i></a>
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
        $tblMascaras = TblMascara::query();

        return $this->applyScopes($tblMascaras);
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
            'Mascara' => ['name' => 'Mascara', 'data' => 'Mascara']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'tblMascaras';
    }
}
