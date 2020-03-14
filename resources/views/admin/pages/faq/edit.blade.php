@extends('admin.layouts.app')

@section('title', 'FAQ '.$faq->getTitle())
@section('content')
    @include('admin.components.breadcrumb', [
        'list' => [
            [
                'url' => route('admin.faq.index'),
                'title' => 'FAQ'
            ]
        ],
        'lastTitle' => $faq->getTitle()
    ])

    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{ $faq->getTitle() }} <small>FAQ</small></h3>
        </div>
        <form action="{{ route('admin.faq.update', $faq->id) }}" method="post">
            @csrf
            @method('PUT')
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
                                    <input class="form-control" type="text" id="ruTitle" name="ru_title" value="{{ $faq->ru_title }}">
                                    <label for="ruTitle" @error('ru_title') class="col-form-label" @enderror>
                                        Заголовок
                                        @error('ru_title') <span class="text-danger">*</span> @enderror
                                    </label>
                                </div>
                                @error('ru_title') <div id="val-username-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group @error('ru_content') is-invalid @enderror">
                                <label for="ru_content">Описание</label>
                                <textarea name="ru_content" id="ru_content"
                                          class="form-control">{{ $faq->ru_content }}</textarea>
                                @error('ru_content') <div id="val-username-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <!-- END Step 1 -->

                        <!-- Step 2 -->
                        <div class="tab-pane" id="wizard-simple-step2" role="tabpanel">
                            <div class="form-group @error('en_title') is-invalid @enderror">
                                <div class="form-material floating">
                                    <input class="form-control" type="text" id="en_title" name="enTitle" value="{{ $faq->en_title }}">
                                    <label for="enTitle" @error('en_title') class="col-form-label" @enderror>
                                        Заголовок
                                        @error('en_title') <span class="text-danger">*</span> @enderror
                                    </label>
                                </div>
                                @error('en_title') <div id="val-username-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group @error('en_content') is-invalid @enderror">
                                <label for="en_content">Описание</label>
                                <textarea name="en_content" id="en_content"
                                          class="form-control">{{ $faq->en_content }}</textarea>
                                @error('en_content') <div id="val-username-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <!-- END Step 2 -->

                        <!-- Step 3 -->
                        <div class="tab-pane" id="wizard-simple-step3" role="tabpanel">
                            <div class="form-group @error('uz_title') is-invalid @enderror">
                                <div class="form-material floating">
                                    <input class="form-control" type="text" id="uzTitle" name="uz_title" value="{{ $faq->uz_title }}">
                                    <label for="uzTitle" @error('uz_title') class="col-form-label" @enderror>
                                        Заголовок
                                        @error('uz_title') <span class="text-danger">*</span> @enderror
                                    </label>
                                </div>
                                @error('uz_title') <div id="val-username-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group @error('uz_content') is-invalid @enderror">
                                <label for="uz_content">Описание</label>
                                <textarea name="uz_content" id="uz_content"
                                          class="form-control">{{ $faq->uz_content }}</textarea>
                                @error('uz_content') <div id="val-username-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <!-- END Step 3 -->
                    </div>
                    <!-- END Steps Content -->
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
