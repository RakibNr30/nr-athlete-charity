<?php

namespace Modules\Cms\DataTables;

use Modules\Cms\Entities\Cases;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CasesDataTable extends DataTable
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
                return view('cms::cases.action', compact('data'))->render();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param Cases $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Cases $model)
    {
        // News model instance
        $cases = $model->newQuery();

        // apply join
        $cases->join('countries', 'cases.area_id', 'countries.id');

        // select data
        $cases->select([
            'cases.*',
            'countries.country_name as cases_area'
        ]);

        $cases->latest();

        return $cases;
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
            Column::make('title'),
            Column::make('cases_area'),
            Column::make('created_at')->title('Date'),
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
        return 'Cases_' . date('YmdHis');
    }
}
