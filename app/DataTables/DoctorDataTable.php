<?php

namespace App\DataTables;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DoctorDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function ($data) {
            $btnActions = "<a href='" . route('Doctor.edit', $data->id) . "' id='" . $data->id . "' class='btn btn-outline-primary border-0 text-center rounded-circle'><i class='feather text-center icon-edit-2'></i></a>";
            $btnActions .= "<a href='".route('Doctor.show', $data->id)."' class='btn btn-outline-warning border-0 text-center rounded-circle'><i class='feather text-center icon-eye'></i></a>";
            return $btnActions;
        })
            ->addColumn('status', function ($data) {
                if ($data->account_status == DOCTOR_ACCOUNT_ACTIVE) {
                    return '<span class="badge badge-success">Active</span>';
                } else {
                    return '<span class="badge badge-danger">Inactive</span>';
                }
            })
            ->addColumn("department", function($data){
                return $data->doc_department->department_name;
            })
            ->setRowId('id')
            ->rawColumns(['action', 'status', 'department']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Doctor $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('doctor-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make("doctor_name"),
            Column::make("mobile_number"),
            Column::make("email_address"),
            Column::make("cnic"),
            Column::make("department"),
            Column::make("status"),
            Column::make("action"),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Doctor_' . date('YmdHis');
    }
}
