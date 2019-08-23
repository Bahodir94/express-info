@extends('admin.layouts.app')

@section('title', 'Добавить пользователя')

@section('content')
    @include('admin.components.breadcrumb', [
        'list' => [
            [
                'url' => route('admin.users.index'),
                'title' => 'Пользователи'
            ]
        ],
        'lastTitle' => 'Добавить пользователя'
    ])
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Добавить пользователя</h3>
        </div>
        <div class="block-content">
            <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group @error('name') is-invalid @enderror">
                            <div class="form-material floating">
                                <label for="name">Имя пользователя</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
                            </div>
                            @error('name') <div class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group @error('email') is-invalid @enderror">
                            <div class="form-material floating">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            </div>
                            @error('email') <div class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group @error('password') is-invalid @enderror">
                            <div class="form-material floating">
                                <label for="password">Пароль</label>
                                <input type="password" name="password" id="passwrod" class="form-control">
                            </div>
                            @error('password') <div class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <div class="form-material floating">
                                <label for="roleId">Роль</label>
                                <select name="roleId" id="roleId">
                                    <option value="0" selected>Нет</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->descripton }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="image">Аватар</label>
                        <input type="file" name="image" id="image">
                    </div>
                </div>
                <div class="block-content mb-10">
                    <div class="block-content text-right pb-10">
                        <button class="btn btn-alt-success" name="save">Сохранить</button>
                        <button class="btn btn-alt-success" name="saveQuit">Сохранить и выйти</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
