<?php

namespace App\DataTables;

use App\Models\Block;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\WithExportQueue;
use Yajra\DataTables\Services\DataTable;

class BlocksDataTable extends DataTable
{
    use WithExportQueue;
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                return "<a href='" . route('Blocks.edit', $row->id) . "' class='text-primary btn'><i class='feather text-center icon-edit-2'></i></a>" .
                    "<a href='" . route("Blocks.show", $row->id) . "' class='text-secondary btn'><i class='text-center feather icon-eye'></i></a>";
            })
            ->addColumn('user_id', function ($row) {
                return $row->getUser->name;
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Block $model): QueryBuilder
    {
        return $model->newQuery()->with('getUser');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('blocks-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'buttons' => ['csv', 'pdf']
            ])
            ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('block_name'),
            Column::make('created_at'),
            Column::make("updated_at"),
            Column::make('user_id'),
            Column::computed('action')
                ->exportable(!true)
                ->printable(!true)
                ->width(40)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Blocks_' . date('YmdHis');
    }
}
