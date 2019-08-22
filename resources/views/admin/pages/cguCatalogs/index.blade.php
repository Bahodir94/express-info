@extends('admin.layouts.app')

@section('title', 'ЦГУ Каталоги')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
    @include('admin.components.breadcrumb', ['lastTitle' => 'Цгу Каталог'])
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Каталог <small>все</small></h3>
            <div class="block-options">
                <a href="{{ route('admin.cgucatalogs.create') }}" class="btn btn-primary">Создать</a>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-responsive table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                <tr>
                    <th class="text-center"></th>
                    <th class="sorting_desc">Заголовок</th>
                    <th>Категория</th>
                    <th>Активность</th>
                    <th class="text-center" style="width: 15%;">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($catalogs as $catalog)
                    <tr>
                        <td class="text-center">{{ $catalog->id }}</td>
                        <td class="font-w600">{{ $catalog->getTitle() }}</td>
                        <td>
                            @if($catalog->hasParentCategory())
                                @if($catalog->parentCategory->hasParentCategory())
                                    <a href="{{ route('admin.cgucategories.show', $catalog->parentCategory->parentCategory->id) }}">
                                @else
                                    <a href="{{ route('admin.cgucategories.index') }}">
                                @endif
                            @endif
                                {{ $catalog->getParentCategoryTitle() }}
                            @if($catalog->hasParentCategory())
                                @if($catalog->parentCategory->hasParentCategory())
                                        </a>
                                @endif
                            @endif
                        </td>
                        <td>{!! $catalog->getActiveRender() !!}</td>
                        <td class="text-center d-flex align-items-center justify-content-center">
                            <a data-toggle="tooltip" title="Редактировать" href="{{ route('admin.cgucatalogs.edit', $catalog->id) }}"><i class="fa fa-edit"></i></a>
                            <form method="post" action="{{ route('admin.cgucatalogs.destroy', $catalog->id) }}">
                                @csrf
                                @method('delete')
                                <button style="border: none;background-color: transparent;" onclick="return confirm('Вы уверены?')" data-toggle="tooltip" title="Удалить">
                                    <i class="fa fa-trash text-danger"></i>
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
            "order": [],
            pageLength: 10,
            lengthMenu: [[10, 20, 30, 50], [10, 20, 30, 50]],
            autoWidth: true,
            language: ru_datatable
        });
    </script>
@endsection