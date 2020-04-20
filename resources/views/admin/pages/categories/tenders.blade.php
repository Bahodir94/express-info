@extends('admin.layouts.app')

@section('title')
    Конкурсы {{ $category->ru_title }}
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
    @include('admin.components.breadcrumb', [
        'list' => [
            [
                'url' => route('admin.categories.index'),
                'title' => 'Категории справочника'
            ],
            [
                'url' => ($category->hasParentCategory()) ? route('admin.categories.show', $category->parentCategory->id) : '',
                'title' => ($category->hasParentCategory()) ? $category->parentCategory->ru_title : ''
            ],
            [
                'url' => route('admin.categories.show', $category->id),
                'title' => $category->ru_title
            ],
        ],
        'lastTitle' => 'Конкурсы'
    ])
    <div class="block">
        <div class="block-header block-headder-default">
            <h3 class="block-title">{{ $category->ru_title }} <small>Конкурсы</small></h3>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-stripped table-bordered table-vcenter js-dataTable-full">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px"></th>
                        <th class="text-center">Заголовок</th>
                        <th class="text-center">Категории</th>
                        <th class="text-center">Владелец</th>
                        <th class="text-center">Создан</th>
                        <th class="text-center" style="width: 50px">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($category->getAllTendersFromDescendingCategories() as $tender)
                        <tr>
                            <td class="text-center">
                                {{ $loop->index+1 }}
                            </td>
                            <td class="text-center font-w600">{{ $tender->title }}</td>
                            <td class="text-center">@foreach($tender->categories as $tenderCategory)
                                    <div>{{ $tenderCategory->getTitle() }}</div> @endforeach</td>
                            <td class="text-center">@if ($tender->owner) <a
                                    href="{{ route('admin.users.edit', $tender->owner_id) }}"
                                    class="link-effect">{{ $tender->owner->getCommonTitle() }}</a> @else Не
                                зарегистрирован @endif</td>
                            <td class="text-center">{{ $tender->created_at->format('d.m.Y') }}</td>
                            <td class="text-center font-w600">
                                <div class="d-flex align-items-center justify-content-around">
                                    <a href="{{ route('admin.tenders.show', $tender->id) }}?from_category={{ $category->id }}"
                                       class="btn btn-sm btn-alt-info" data-toggle="tooltip" title="Редактировать"><i
                                            class="fa fa-pencil"></i></a>
                                    <form action="{{ route('admin.tenders.destroy', $tender->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="from_category" value="{{ $category->id }}">
                                        <button class="btn btn-sm btn-alt-danger"
                                                onclick="return confirm('Вы уверены?');">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
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
        $('.position').change(function () {
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
                url: '{{ route('admin.companies.change.position') }}',
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $('.position').attr('disabled', 'disabled');
                },
                success: function () {
                    $('.position').removeAttr('disabled', '');
                },
                error: function (data) {
                    console.log(data);
                    $('.position').removeAttr('disabled', '');
                }
            })
        });
        jQuery('.js-dataTable-full').dataTable({
            "order": [],
            pageLength: 10,
            lengthMenu: [[10, 20, 30, 50], [10, 20, 30, 50]],
            autoWidth: true,
            language: ru_datatable
        });
    </script>
@endsection
