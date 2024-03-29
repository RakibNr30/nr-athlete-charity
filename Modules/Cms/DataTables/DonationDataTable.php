<?php

namespace Modules\Cms\DataTables;

use Modules\Cms\Entities\Donation;
use Modules\Cms\Entities\Rice;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class DonationDataTable extends DataTable
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
            ->addColumn('action', function ($data) {});
    }

    /**
     * Get query source of dataTable.
     *
     * @param Rice $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Donation $model)
    {
        // News model instance
        $donations = $model->newQuery();

        // apply join
        $donations->join('users as athlete', 'athlete.id', 'donations.donner_id');

        // select
        $donations->select([
            'athlete.athlete_id',
            'donations.*'
        ]);

        // latest data
        $donations->latest();

        // return data
        return $donations;
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
            Column::make('athlete_id')->name('athlete.athlete_id'),
            Column::make('donate_amount')->title('Donation (EUR)'),
            Column::make('created_at')->title('Donate At')
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
        return 'Donate_' . date('YmdHis');
    }
}
