@extends('admin.layouts.app')

@section('title', 'Добавить меню')

@section('content')
    @include('admin.components.breadcrumb', [
        'list' => [
            [
                'url' => route('admin.needs.index'),
                'title' => 'Потребности'
            ],
            [
                'url' => route('admin.needs.menu', $needId),
                'title' => $need->ru_title
            ]
        ],
        'lastTitle' => 'Добавить меню'
    ])
    <form action="{{ route('admin.menu.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="need_id" value="{{ $needId }}">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Добавить меню <small>{{ $need->ru_title }}</small></h3>
                <div class="block-options">
                    <button class="btn btn-sm btn-alt-success" type="submit"><i class="fa fa-check"></i> Сохранить</button>
                    <button class="btn btn-sm btn-alt-success" type="submit" name="saveQuit"><i class="fa fa-check"></i> Сохранить и выйти</button>
                </div>
            </div>
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
                        </div>
                        <!-- END Step 3 -->
                    </div>
                    <!-- END Steps Content -->
                </div>
                <div class="form-group">
                    <label for="image">Изображение</label>
                    <input type="file" name="image" class="form-control">
                </div>
            </div>
        </div>
    </form>
@endsection