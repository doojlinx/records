<?php

namespace App\DataTables;

use App\ExportFromDatable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Investment;

class ExportFromDatableDataTable extends DataTable
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
            ->eloquent($query);
            //->addColumn('action', 'exportfromdatable.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\ExportFromDatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ExportFromDatable $model)
    {
        //return $model->newQuery();
        $data = Export::select();
        return $this->applyScopes($data);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('exportfromdatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('excel'),
                        Button::make('pdft'),
                        Button::make('print'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('investor_number'),
            Column::make('fname'),
            Column::make('lname'),
            Column::make('aname'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ExportFromDatable_' . date('YmdHis');
    }
}
