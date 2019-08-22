@extends('admin.layouts.app')

@section('title')
    Добавить компанию
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/select2-bootstrap.min.css') }}">
@endsection
@section('content')
    @include('admin.components.breadcrumb', [
        'list' => [
            [
                'url' => route('admin.handbooks.index'),
                'title' => 'Компании справочника'
            ]
        ],
        'lastTitle' => 'Создание'
    ])

    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Добавить компанию</h3>
        </div>
        <form action="{{ route('admin.handbooks.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="block-content">
                <div class="wizard-block">
                    <ul class="nav nav-tabs nav-tabs-block nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#wizard-simple-step1" data-toggle="tab">1. Русский</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-simple-step2" data-toggle="tab">2. Английский</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-simple-step3" data-toggle="tab">3. Узбекский</a>
                        </li>
                    </ul>
                    <!-- END Step Tabs -->

                    <!-- Steps Content -->
                    <div class="block-content block-content-full tab-content">
                        <!-- Step 1 -->
                        <div class="tab-pane active" id="wizard-simple-step1" role="tabpanel">
                            <div class="form-group @error('ru_title') is-invalid @enderror">
                                <div class="form-material floating">
                                    <label for="ru_title" @error('ru_title') class="col-form-label" @enderror>
                                    Заголовок
                                    @error('ru_title') <span class="text-danger">*</span> @enderror
                                    </label>
                                    <input class="form-control" type="text" id="ru_title" name="ru_title" value="{{ old('ru_title') }}">
                                </div>
                                @error('ru_title') <div id="val-username-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group @error('ru_description') is-invalid @enderror">
                                <label for="ruDescription">Описание</label>
                                    <textarea name="ru_description" id="ruDescription"
                                              class="form-control">{{ old('ru_description') }}</textarea>
                                @error('ru_description') <div id="val-username-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <!-- END Step 1 -->

                        <!-- Step 2 -->
                        <div class="tab-pane" id="wizard-simple-step2" role="tabpanel">
                            <div class="form-group @error('en_title') is-invalid @enderror">
                                <div class="form-material floating">
                                    <label for="uz_title" @error('en_title') class="col-form-label" @enderror>
                                    Заголовок
                                    @error('en_title') <span class="text-danger">*</span> @enderror
                                    </label>
                                    <input class="form-control" type="text" id="en_title" name="en_title" value="{{ old('en_title') }}">
                                </div>
                                @error('en_title') <div id="val-username-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group @error('en_description') is-invalid @enderror">
                                <label for="enDescription">Описание</label>
                                    <textarea name="en_description" id="enDescription"
                                              class="form-control">{{ old('en_description') }}</textarea>
                                @error('en_description') <div id="val-username-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <!-- END Step 2 -->

                        <!-- Step 3 -->
                        <div class="tab-pane" id="wizard-simple-step3" role="tabpanel">
                            <div class="form-group @error('uz_title') is-invalid @enderror">
                                <div class="form-material floating">
                                    <label for="uz_title" @error('uz_title') class="col-form-label" @enderror>
                                    Заголовок
                                    @error('uz_title') <span class="text-danger">*</span> @enderror
                                    </label>
                                    <input class="form-control" type="text" id="uz_title" name="uz_title" value="{{ old('uz_title') }}">
                                </div>
                                @error('uz_title') <div id="val-username-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group @error('uz_description') is-invalid @enderror">
                                <label for="uzDescription">Описание</label>
                                    <textarea name="uz_description" id="uzDescription"
                                              class="form-control">{{ old('uz_description') }}</textarea>
                                @error('uz_description') <div id="val-username-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <!-- END Step 3 -->
                    </div>
                    <!-- END Steps Content -->
                </div>
                <div class="form-group">
                    <div class="form-material floating">
                        <input type="text" name="url" id="url" value="{{ old('url') }}" class="form-control">
                        <label for="url">Ссылка на сайт</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-material floating">
                        <select name="category_id" id="categoryId" class="form-control">
                            <option value="0">-- нет --</option>
                            @foreach($categories as $category_list)
                                @include('admin.pages.handbooks.components.category', ['delimiter' => ''])
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image">Изображение</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <div class="form-materil floating">
                        <input type="text" name="logo_url" id="logoUrl" class="form-control" value="{{ old('logo_url') }}">
                        <label for="logoUrl">Ссылка на логотип</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-material floating">
                        <select name="active" id="active" class="form-control">
                            <option value="1" selected>Да</option>
                            <option value="0">Нет</option>
                        </select>
                        <label for="active">Активный</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-material floating">
                        <label for="">Номер телефона</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number') }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-material floating">
                        <label for="">Геолокация</label>
                        <input type="text" name="geo_location" class="form-control" value="{{ old('geo_location') }}">
                    </div>
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
@endsection
