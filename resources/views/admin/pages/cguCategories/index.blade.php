@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
    @include('admin.components.breadcrumb', ['lastTitle' => 'Цгу Категории'])
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Категории <small>главные</small></h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                <tr>
                    <th class="text-center"></th>
                    <th>Name</th>
                    <th class="d-none d-sm-table-cell">Email</th>
                    <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                    <th class="text-center" style="width: 15%;">Profile</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center">1</td>
                    <td class="font-w600">Barbara Scott</td>
                    <td class="d-none d-sm-table-cell">customer1@example.com</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-danger">Disabled</span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                            <i class="fa fa-user"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td class="font-w600">Laura Carr</td>
                    <td class="d-none d-sm-table-cell">customer2@example.com</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-success">VIP</span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                            <i class="fa fa-user"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">3</td>
                    <td class="font-w600">Melissa Rice</td>
                    <td class="d-none d-sm-table-cell">customer3@example.com</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-info">Business</span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                            <i class="fa fa-user"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">4</td>
                    <td class="font-w600">Susan Day</td>
                    <td class="d-none d-sm-table-cell">customer4@example.com</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-info">Business</span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                            <i class="fa fa-user"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">5</td>
                    <td class="font-w600">Sara Fields</td>
                    <td class="d-none d-sm-table-cell">customer5@example.com</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-warning">Trial</span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                            <i class="fa fa-user"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">6</td>
                    <td class="font-w600">Carl Wells</td>
                    <td class="d-none d-sm-table-cell">customer6@example.com</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-info">Business</span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                            <i class="fa fa-user"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">7</td>
                    <td class="font-w600">Lori Moore</td>
                    <td class="d-none d-sm-table-cell">customer7@example.com</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-warning">Trial</span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                            <i class="fa fa-user"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">8</td>
                    <td class="font-w600">Jeffrey Shaw</td>
                    <td class="d-none d-sm-table-cell">customer8@example.com</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-danger">Disabled</span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                            <i class="fa fa-user"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">9</td>
                    <td class="font-w600">Scott Young</td>
                    <td class="d-none d-sm-table-cell">customer9@example.com</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-danger">Disabled</span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                            <i class="fa fa-user"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">10</td>
                    <td class="font-w600">Sara Fields</td>
                    <td class="d-none d-sm-table-cell">customer10@example.com</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-warning">Trial</span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                            <i class="fa fa-user"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">11</td>
                    <td class="font-w600">Carol White</td>
                    <td class="d-none d-sm-table-cell">customer11@example.com</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-danger">Disabled</span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                            <i class="fa fa-user"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">12</td>
                    <td class="font-w600">Brian Cruz</td>
                    <td class="d-none d-sm-table-cell">customer12@example.com</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-primary">Personal</span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                            <i class="fa fa-user"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">13</td>
                    <td class="font-w600">Albert Ray</td>
                    <td class="d-none d-sm-table-cell">customer13@example.com</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-danger">Disabled</span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                            <i class="fa fa-user"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">14</td>
                    <td class="font-w600">Lori Grant</td>
                    <td class="d-none d-sm-table-cell">customer14@example.com</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-info">Business</span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                            <i class="fa fa-user"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">15</td>
                    <td class="font-w600">Danielle Jones</td>
                    <td class="d-none d-sm-table-cell">customer15@example.com</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-success">VIP</span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                            <i class="fa fa-user"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">16</td>
                    <td class="font-w600">Carol Ray</td>
                    <td class="d-none d-sm-table-cell">customer16@example.com</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-info">Business</span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                            <i class="fa fa-user"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">17</td>
                    <td class="font-w600">Judy Ford</td>
                    <td class="d-none d-sm-table-cell">customer17@example.com</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-info">Business</span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                            <i class="fa fa-user"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">18</td>
                    <td class="font-w600">David Fuller</td>
                    <td class="d-none d-sm-table-cell">customer18@example.com</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-primary">Personal</span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                            <i class="fa fa-user"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">19</td>
                    <td class="font-w600">Lori Moore</td>
                    <td class="d-none d-sm-table-cell">customer19@example.com</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-warning">Trial</span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                            <i class="fa fa-user"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">20</td>
                    <td class="font-w600">Helen Jacobs</td>
                    <td class="d-none d-sm-table-cell">customer20@example.com</td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-danger">Disabled</span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                            <i class="fa fa-user"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        jQuery('.js-dataTable-full').dataTable({
            columnDefs: [ { orderable: false, targets: [ 4 ] } ],
            pageLength: 10,
            lengthMenu: [[10, 20, 30, 50], [10, 20, 30, 50]],
            autoWidth: true,
            language: {
                "sProcessing":   "Подождите...",
                "sLengthMenu":   "Показать _MENU_ записей",
                "sZeroRecords":  "Записи отсутствуют.",
                "sInfo":         "Записи с _START_ до _END_ из _TOTAL_ записей",
                "sInfoEmpty":    "Записи с 0 до 0 из 0 записей",
                "sInfoFiltered": "(отфильтровано из _MAX_ записей)",
                "sInfoPostFix":  "",
                "sSearch":       "Поиск:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst": "Первая",
                    "sPrevious": "Предыдущая",
                    "sNext": "Следующая",
                    "sLast": "Последняя"
                },
                "oAria": {
                    "sSortAscending":  ": активировать для сортировки столбца по возрастанию",
                    "sSortDescending": ": активировать для сортировки столбцов по убыванию"
                }
            }
        });
    </script>
@endsection