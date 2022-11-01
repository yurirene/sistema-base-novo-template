<?php

namespace App\DataTables;

use App\Models\Status;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class StatusDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function($sql) {
                return view('parametros.actions', [
                    'route' => 'status',
                    'id' => $sql->id,
                    'nome' => $sql->nome,
                ]);
            })
            ->editColumn('created_at', function($sql) {
                return $sql->created_at->format('d/m/Y H:i:s');
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Membro $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Status $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('status-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1, 'asc')
            ->parameters([
                'buttons' => [
                    [
                        'text' => '<i class="fas fa-plus"></i> Novo Registro',
                        'className' => 'btn-novo-registro',
                        'action' => 'function() {
                            $("#modal-parametro").modal("show");
                        }'
                    ],
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('nome')->title('Nome'),
            Column::make('created_at')->title('Criado em'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Status_' . date('YmdHis');
    }
}
