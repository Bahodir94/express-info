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
                <a href="{{ route('admin.cgucategories.create') }}" class="btn btn-primary">Создать</a>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th>Заголовок</th>
                        <th class="d-none d-sm-table-cell">Категории</th>
                        <th class="d-none d-sm-table-cell">Справки</th>
                        <th class="text-center" style="width: 15%;">Действия</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td class="text-center">{{ $category->id }}</td>
                        <td class="font-w600">{{ $category->getTitle() }}</td>
                        <td class="d-none d-sm-table-cell">
                            @if($category->hasChildren())
                                Перейти
                            @else
                                Нет
                            @endif
                        </td>
                        <td class="d-none d-sm-table-cell">
                            @if($category->hasHandbook())
                                Перейти
                            @else
                                Нет
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.cgucategories.edit', $category->id) }}"><i class="fa fa-edit"></i></a>
                            <form method="post" action="{{ route('admin.cgucategories.destroy', $category->id) }}">
                                @csrf
                                <button onclick="return confirm('Вы уверены?')" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Удалить">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
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
            language: ru_datatable
        });
    </script>
@endsection