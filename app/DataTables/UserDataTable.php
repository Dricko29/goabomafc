<?php

namespace App\DataTables;

use App\Models\Role;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\SearchPane;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class UserDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('check', 'backend.access.user.bulk', false)
            ->addColumn('action', 'backend.access.user.action')
            ->editColumn('roles', function($row){
                return $row->roles->map(function($role){
                    return '<span class="badge bg-primary">'.$role->name.'</span>';
                })->implode(' ');
            })
            ->rawColumns(['check', 'action', 'roles'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()->with('roles')->whereNot('id',auth()->user()->id)->latest();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('user-table')
            ->addTableClass('table nowrap dt-responsive align-middle table-hover table-bordered')
            ->setTableAttributes(['style' => 'width:100%'])
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4 text-center'B><'col-sm-12 col-md-4'f>>" 
            . "<'row'<'col-sm-12'tr>>" 
            . "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>")
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
            ])
            ->language(
                [
                    'url' => url('https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json')
                ],
            );
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::computed('check', '<input class="form-check-input fs-15" type="checkbox" name="check_all" id="checkAll" value="option">')
                ->titleAttr('select all')
                ->exportable(false)
                ->printable(false)
                ->width('20'),
            Column::make('DT_RowIndex')
                ->title('#')
                ->orderable(false)
                ->searchable(false),
            Column::make('name')->title('Nama User'),
            Column::make('email')->title('Email'),
            Column::make('roles', 'roles.name', 'roles.name')->orderable(false),
            Column::make('created_at')->title('Tanggal Dibuat'),
            Column::make('updated_at')->title('Terakhir Diubah'),
            Column::computed('action', 'Aksi')
                ->titleAttr('aksi')
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
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}