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
                'url' => route('admin.handbookscategories.index'),
                'title' => 'Категории справочника'
            ],
            [
                'url' => ($category->hasParentCategory()) ? route('admin.handbookcategories.show', $category->parentCategory->id) : '',
                'title' => ($category->hasParentCategory()) ? $category->parentCategory->ru_title : ''
            ],
            [
                'url' => route('admin.handbookcategories.show', $category->id),
                'title' => $category->ru_title
            ],
        ],
        'lastTitle' => 'Компании'
    ])
    <div class="block">
        <div class="block-header block-headder-default">
            <h3 class="block-title">{{ $category->ru_title }} <small>Компании</small></h3>
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
                        @foreach($category->companies as $company)
                            <tr>
                                <td class="text-center">
                                    @if($company->image)<img src="{{ $company->getImage() }}" alt="{{ $company->ru_title }}" class="img-avatar img-avatar48"> @else - @endif
                                </td>
                                <td class="text-center font-w600">{{ $company->ru_title }}</td>
                                <td class="text-center font-w600">{{ $category->getTitle() }}</td>
                                <td class="text-center font-w600">{{ $company->userClicks()->count() }}</td>
                                <td class="text-center font-w600 d-flex align-items-center justify-content-around">
                                    <a href="{{ route('admin.companies.edit', $company->id) }}" class="btn btn-sm btn-alt-info" data-toggle="tooltip" title="Редактировать"><i class="fa fa-pencil"></i></a>
                                    <form action="{{ route('admin.companies.destroy', $company->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-alt-danger" onclick="return confirm('Вы уверены?');">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    <select name="position" id="position" class="position">
                                        @for($i = 0; $i <= count($category->companies); $i++)
                                            <option value="{{ $i }}" @if($company->position == $i) selected @endif>{{ $i }}</option>
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
