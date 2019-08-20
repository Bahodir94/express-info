@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
    @include('admin.components.breadcrumb', ['lastTitle' => 'Катеогрии справочника'])
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Категории справочника</h3>
            <div class="block-options">
                <a href="{{ route('admin.cgucategories.create') }}" class="btn btn-primary">Создать</a>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
            </div>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-stripped table-bordered table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="text-center">Заголовок</th>
                            <th class="text-center">Категории</th>
                            <th class="text-center">Справочники</th>
                            <th class="text-center">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td class="text-center">{{ $category->id }}</td>
                                <td class="font-w600">{{ $category->getTitle() }}</td>
                                <td class="text-center">
                                    @if($category->hasCategories())
                                        <a href="{{ route('admin.handbookcategories.category', $category->id) }}" class="link-effect">Перейти</a>
                                    @else
                                        Нет
                                    @endif
                                </td>
                                <td class="text-center">
                                    Нет
                                </td>
                                <td class="text-center">
                                    <a data-toggle="tooltip" title="Редактировать" href="{{ route('admin.handbookcategories.edit', $category->id) }}"><i class="fa fa-edit"></i></a>
                                    <form method="post" action="{{ route('admin.handbookcategories.destroy', $category->id) }}">
                                        @csrf
                                        <button style="border: none;background-color: transparent;" onclick="return confirm('Вы уверены?')" type="button" data-toggle="tooltip" title="Удалить">
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
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        jQuery('.js-dataTable-full').dataTable({
            "order": [],
            pageLength: 10,
            lengthMenu: [[10, 20, 30, 50], [10, 20, 30, 50]],
            autoWidth: true,
            language: ru_datatable
        });
    </script>
@endsection
