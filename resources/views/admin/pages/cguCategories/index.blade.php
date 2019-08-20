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
            <table class="table table-responsive table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th class="sorting_desc">Заголовок</th>
                        <th>Категории</th>
                        <th>Сайты</th>
                        <th class="text-center" style="width: 15%;">Действия</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td class="text-center">{{ $category->id }}</td>
                        <td class="font-w600">{{ $category->getTitle() }}</td>
                        <td>
                            @if($category->hasCategories())
                                <a href="{{ route('admin.cgucategories.show', $category->id) }}">Перейти</a>
                            @else
                                Нет
                            @endif
                        </td>
                        <td>
                            @if($category->hasSites())
                                <a href="{{ route('admin.cgucategories.sites', $category->id) }}">Перейти</a>
                            @else
                                Нет
                            @endif
                        </td>
                        <td class="text-center d-flex align-items-center">
                            <a data-toggle="tooltip" title="Редактировать" href="{{ route('admin.cgucategories.edit', $category->id) }}"><i class="fa fa-edit"></i></a>
                            <form method="post" action="{{ route('admin.cgucategories.destroy', $category->id) }}">
                                @csrf
                                @method('delete')
                                <button style="border: none;background-color: transparent;" onclick="return confirm('Вы уверены?')" data-toggle="tooltip" title="Удалить">
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

@endsection

@section('js')
    <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        $('.js-dataTable-full').dataTable({
            "order": [],
            pageLength: 10,
            lengthMenu: [[10, 20, 30, 50], [10, 20, 30, 50]],
            autoWidth: true,
            language: ru_datatable
        });

        $('.position').change(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = new FormData;
            formData.append('id', $(this).data('id'));
            formData.append('position', $(this).val());
            $.ajax({
                type: 'POST',
                url: '{{ route('admin.cgucategories.change.position') }}',
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('.position').attr('disabled', '');
                },
                success: function(data){
                    console.log(data);
                    $('.position').removeAttr('disabled', '');
                },
                error: function (data) {
                    console.log(data);
                }
            });
        })
    </script>
@endsection