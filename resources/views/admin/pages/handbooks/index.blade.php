@extends('admin.layouts.app')

@section('title')
    Компании
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css') }}">

    <style>
        .js-dataTable-full .btn {
            height: 100%;
        }
    </style>
@endsection
@section('content')
    @include('admin.components.breadcrumb', ['lastTitle' => 'Компании'])
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Компании</h3>
            <div class="block-options">
                <a href="{{ route('admin.handbooks.create') }}" class="btn btn-primary">Создать</a>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
            </div>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-stripped table-bordered table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px"><i class="fa fa-image"></i></th>
                            <th class="text-center">Заголовок</th>
                            <th class="text-center">Кол-во кликов</th>
                            <th class="text-center">Категория</th>
                            <th class="text-center">Активность</th>
                            <th class="text-center" style="width: 50px">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($handbooks as $handbook)
                            <tr>
                                <td class="text-center font-w600">@if($handbook->image)<img src="{{ $handbook->getImage() }}" alt="{{ $handbook->ru_title }}" class="img-avatar img-avatar48"> @else - @endif</td>
                                <td class="text-center font-w600">{{ $handbook->getTitle() }}</td>
                                <td class="text-center font-w600"> - </td>
                                <td class="text-center font-w600">@if($handbook->category){{ $handbook->category->getTitle() }} @else - @endif</td>
                                <td class="text-center font-w600">
                                    @if($handbook->active)
                                        <i class="text-success fa fa-check"></i>
                                    @else
                                        <i class="text-danger fa fa-times"></i>
                                    @endif
                                </td>
                                <td class="text-center font-w600 d-flex align-items-center justify-content-around">
                                    <a href="{{ route('admin.handbooks.edit', $handbook->id) }}" class="btn btn-sm btn-alt-info"
                                       data-toggle="tooltip"
                                       title="Редактировать"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('admin.handbooks.destroy', $handbook->id) }}" method="post" data-toggle="tooltip" title="Удалить">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-alt-delete" onclick="return confirm('Вы уверены?')"><i class="fa fa-trash"></i></button>
                                    </form>
                                    <select name="position" id="position" class="position">
                                        @for($i = 0; $i <= count($handbooks); $i++)
                                            <option value="{{ $i }}" @if($handbook->position == $i) selected @endif>{{ $i }}</option>
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
                url: '{{ route('admin.handbooks.change.position') }}',
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
