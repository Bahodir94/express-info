@extends('admin.layouts.app')

@section('title', 'Потребности')

@section('content')
    @include('admin.components.breadcrumb', [
        'lastTitle' => 'Потребности'
    ])
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Типы потребностей</h3>
            <div class="block-options">
                <a href="{{ route('admin.needs.create') }}" class="btn btn-alt-success"><i class="fa fa-plus mr-5"></i> Добавить</a>
            </div>
        </div>
        <div class="block-content">
            <ul class="list-group list-group-flush mb-20">
                @foreach($needs as $need)
                    <li class="list-group-item d-flex justify-content-between align-items-center">{{ $need->ru_title }}
                        <a href="{{ route('admin.needs.edit', $need->id) }}" data-toggle="tooltip" title="Редактировать"
                           class="btn btn-sm btn-alt-info"><i class="fa fa-edit"></i></a>
                        <form action="" method="post">
                            @csrf
                            @method('delete')
                            <button data-toggle="tooltip" onclick="return confirm('Вы уверены?')" title="Удалить" class="btn btn-sm btn-alt-danger"><i class="fa fa-trash"></i></button>
                        </form></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
