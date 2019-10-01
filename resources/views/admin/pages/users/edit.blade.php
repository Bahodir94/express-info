@extends('admin.layouts.app')

@section('title', 'Пользователь - '.$user->name)

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/select2-bootstrap.min.css') }}">
@endsection

@section('content')
    @include('admin.components.breadcrumb', [
        'list' => [
            [
                'url' => route('admin.users.index'),
                'title' => 'Пользователи'
            ]
        ],
        'lastTitle' => $user->name
    ])
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{ $user->name }} <small>Редактировать</small></h3>
        </div>
        <div class="block-content">
            <form action="{{ route('admin.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group @error('name') is-invalid @enderror">
                            <div class="form-material floating">
                                <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
                                <label for="name">Имя пользователя</label>
                            </div>
                            @error('name') <div class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group @error('email') is-invalid @enderror">
                            <div class="form-material floating">
                                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                                <label for="email">Email</label>
                            </div>
                            @error('email') <div class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <div class="form-material floating">
                                <select name="roleId" id="roleId" class="form-control">
                                    <option value="0">Нет</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" @if($user->hasOneRole()) @if($user->getRole()->id == $role->id) selected @endif @endif>{{ $role->description }}</option>
                                    @endforeach
                                </select>
                                <label for="roleId">Роль</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 ">
                        <div class="d-flex align-items-center flex-column">
                            <label for="image" class="d-block">Аватар</label>
                            @if ($user->image)
                                <div class="user-image">
                                    <img src="{{ $user->getImage() }}" alt="{{ $user->name }}" class="img-avatar img-avatar48">
                                </div>
                            @endif
                            <input type="file" name="image" id="image" class="d-block">
                        </div>
                    </div>
                </div>
                <div class="block-content mb-10">
                    <div class="block-content text-right pb-10">
                        <button class="btn btn-alt-success" type="submit">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Изменить пароль</h3>
        </div>
        <div class="block-content">
            @if(session('change_password_success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h3 class="alert-heading font-size-h4 font-w400">Успешно!</h3>
                    <p class="mb-0">{{ session('change_password_success') }}</p>
                </div>
            @endif
            <form action="{{ route('admin.users.change.password', $user->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group @error('newPassword') is-invalid @enderror">
                            <div class="form-material floating">
                                <label for="newPassword">Новый пароль</label>
                                <input type="password" name="newPassword" id="newPassword" class="form-control">
                            </div>
                            @error('newPassword') <div class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-material floating @error('confirmPassword') is-invalid @enderror">
                                <label for="confirmPassword">Подтвердите пароль</label>
                                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control">
                            </div>
                            @error('confirmPassword') <div class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="block-content mb-10">
                    <div class="block-content text-right pb-10">
                        <button class="btn btn-alt-success" type="submit">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="block">
        <div class="block--header">
            <h3 class="block-title">История действий</h3>
        </div>
        <div class="block-content">
            {{ $history->links('vendor.pagination.pagination') }}
            <ul class="list-group list-group-flush mb-20">
                @foreach($history as $historyItem)
                    <li class="list-group-item d-flex justify-content-between align-items-center"><span>{!! $historyItem->getTitle() !!}</span>
                    <span class="badge badge-primary badge-pill">{{ $historyItem->created_at }}</span></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/js/plugins/select2/select2.full.min.js') }}"></script>
    <script>
        jQuery(function() {
            Codebase.helper('select2');
        });
    </script>
@endsection
