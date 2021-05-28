<?php

namespace Modules\Cms\DataTables;

use Modules\Cms\Entities\Cases;
use Modules\Cms\Entities\Rice;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class RiceDataTable extends DataTable
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
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return view('cms::rice.action', compact('data'))->render();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param Rice $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Rice $model)
    {
        // News model instance
        $rices = $model->newQuery();

        // latest data
        $rices->latest();

        // return data
        return $rices;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('data_table')
            ->columns($this->getColumns())
            ->minifiedAjax()
           /* ->dom('Bflrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reload')
            )*/
            ->parameters([
                'pageLength' => 10
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
            Column::computed('DT_RowIndex')
                ->title('Sl'),
            Column::make('global_avg_price')->title('Price (per kg)'),
            Column::make('currency'),
            Column::make('created_at')->title('Added At'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Rice_' . date('YmdHis');
    }
}
