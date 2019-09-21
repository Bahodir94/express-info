@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endsection

@section('title') Категории справочника @endsection

@section('content')
    @include('admin.components.breadcrumb', ['lastTitle' => 'Катеогрии справочника'])
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Справочник <small>Категории</small></h3>
            <div class="block-options">
                <a href="{{ route('admin.handbookcategories.create') }}" class="btn btn-alt-primary"><i class="fa fa-plus"></i> Добавить</a>
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
                            <th class="text-center">Потребность</th>
                            <th class="text-center">Категории</th>
                            <th class="text-center">Компании</th>
                            <th class="text-center" style="width: 15%">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td class="text-center">{{ $category->id }}</td>
                                <td class="font-w600 text-center">{{ $category->getTitle() }}</td>
                                <td class="text-center">@if($category->needType) {{ $category->needType->ru_title }} @endif</td>
                                <td class="text-center">
                                    @if($category->hasCategories())
                                        <a href="{{ route('admin.handbookcategories.show', $category->id) }}" class="btn btn-sm btn-alt-primary">Посмотреть</a>
                                    @else
                                        Нет
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($category->hasCompanies())
                                        <a href="{{ route('admin.handbookcategories.companies', $category->id) }}"
                                           class="btn btn-sm btn-alt-primary">Посмотреть</a>
                                    @else
                                        Нет
                                    @endif
                                </td>
                                <td class="text-center d-flex align-items-center">
                                    <a href="{{ route('admin.handbookcategories.edit', $category->id) }}" data-toggle="tooltip" title="Редактировать" class="btn btn-sm btn-alt-info"><i class="fa fa-edit"></i></a>
                                    <form method="post" action="{{ route('admin.handbookcategories.destroy', $category->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button style="border: none; cursor: pointer; background-color: transparent;" class="btn btn-sm btn-alt-delete" onclick="return confirm('Вы уверены?')" data-toggle="tooltip" title="Удалить">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    <select name="position" class="position" data-id="{{ $category->id }}">
                                        @for($i = 0; $i <= count($categories); $i++)
                                            <option value="{{ $i }}" @if($category->position == $i) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
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

        $('.position').change(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let formData = new FormData;
            formData.append('id', $(this).data('id'));
            formData.append('position', $(this).val());
            $.ajax({
                type: 'POST',
                url: '{{ route('admin.handbookcategories.change.position') }}',
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('.position').attr('disabled', 'disabled');
                },
                success: function() {
                    $('.position').removeAttr('disabled', '');
                },
                error: function(data) {
                    console.log(data);
                    $('.position').removeAttr('disabled', '');
                }
            })
        });
    </script>
@endsection
