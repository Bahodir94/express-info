@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
    @include('admin.components.breadcrumb', ['lastTitle' => 'Цгу Сайты'])
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Категории <small>главные</small></h3>
            <div class="block-options">
                <a href="{{ route('admin.cgusites.create') }}" class="btn btn-primary">Создать</a>
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
                @foreach($sites as $site)
                    <tr>
                        <td class="text-center">{{ $site->id }}</td>
                        <td class="font-w600">{{ $site->getTitle() }}</td>
                        <td>
                            @if($site->hasParentCategory())
                                @if($site->parentCategory->hasParentCategory())
                                    <a href="{{ route('admin.cgucategories.show', $site->parentCategory->parentCategory->id) }}">
                                @else
                                    <a href="{{ route('admin.cgucategories.index') }}">
                                @endif
                            @endif
                                {{ $site->getParentCategoryTitle() }}
                            @if($site->hasParentCategory())
                                @if($site->parentCategory->hasParentCategory())
                                    </a>
                                @endif
                            @endif
                        </td>
                        <td>{!! $site->getActiveRender() !!}</td>
                        <td class="text-center d-flex align-items-center">
                            <a data-toggle="tooltip" title="Редактировать" href="{{ route('admin.cgusites.edit', $site->id) }}"><i class="fa fa-edit"></i></a>
                            <form method="post" action="{{ route('admin.cgusites.destroy', $site->id) }}">
                                @csrf
                                @method('delete')
                                <button style="border: none;background-color: transparent;" onclick="return confirm('Вы уверены?')" data-toggle="tooltip" title="Удалить">
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
            "order": [],
            pageLength: 10,
            lengthMenu: [[10, 20, 30, 50], [10, 20, 30, 50]],
            autoWidth: true,
            language: ru_datatable
        });
    </script>
@endsection