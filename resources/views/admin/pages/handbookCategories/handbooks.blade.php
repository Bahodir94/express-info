@extends('admin.layouts.app')

@section('title')
    Справочник {{ $category->ru_title }}
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
                'url' => route('admin.cgucategories.index'),
                'title' => 'Цгу Категории'
            ],
            [
                'url' => ($category->hasParentCategory()) ? route('admin.cgucategories.show', $category->parentCategory->id) : '',
                'title' => ($category->hasParentCategory()) ? $category->parentCategory->ru_title : ''
            ],
            [
                'url' => route('admin.cgucategories.show', $category->id),
                'title' => $category->ru_title
            ],
        ],
        'lastTitle' => 'Справочники'
    ])
    <div class="block">
        <div class="block-header block-headder-default">
            <h3 class="block-title">{{ $category->ru_title }} <small>Справочник</small></h3>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-stripped table-bordered table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px"><i class="fa fa-image"></i></th>
                            <th class="text-center">Заголовок</th>
                            <th class="text-center">Категория</th>
                            <th class="text-center">Кол-во кликов</th>
                            <th class="text-center" style="width: 50px">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category->handbooks as $handbook)
                            <tr>
                                <td class="text-center">
                                    @if($handbook->image)<img src="{{ $handbook->getImage() }}" alt="{{ $handbook->ru_title }}" class="img-avatar img-avatar48"> @else - @endif
                                </td>
                                <td class="text-center font-w600">{{ $handbook->ru_title }}</td>
                                <td class="text-center font-w600">{{ $category->getTitle() }}</td>
                                <td class="text-center font-w600">-</td>
                                <td class="text-center font-w600 d-flex align-items-center justify-content-around">
                                    <a href="{{ route('admin.handbooks.edit', $handbook->id) }}" class="btn btn-sm btn-alt-info" data-toggle="tooltip" title="Редактировать"><i class="fa fa-pencil"></i></a>
                                    <form action="{{ route('admin.handbooks.destroy', $handbook->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-alt-danger" onclick="return confirm('Вы уверены?');">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    <select name="position" id="position" class="position">
                                        @for($i = 0; $i <= count($category->handbooks); $i++)
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
