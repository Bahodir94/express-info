@extends('site.layouts.app')

@section('title', 'Создать конкурс')

@section('meta')
    <meta name="title" content="">
    <meta name="description" content="">
@endsection
@section('header')
    @include('site.layouts.partials.headers.default')
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/ckeditor.css') }}">
@endsection

@section('content')

    <div class="primary-page">
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="title">Сервис поможет найти специалиста в сфере digital</h2>
                <p class="mt-3">Получите предложения по решению задач от дизайна и верстки до программирования и
                    тестирования. Вы можете разместить заказ и ждать откликов или самостоятельно найти специалистов в
                    каталоге.</p>
            </div>
            <div class="box-admin tender-box">
                <div class="header-box-admin">
                    <h3>Создание конкурса</h3>
                </div>
                <hr>
                <div class="body-box-admin">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Что требуется сделать?</label>
                            <input type="text" name="title" id="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   placeholder="Название проекта..." value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <label class="mt-3">Выберите услуги: </label>
                        <ul class="nav nav-tabs mt-3" id="needsTabs" role="tablist">
                            @foreach($needs as $key => $need)
                                <li class="nav-item">
                                    <a href="#tab-content-{{ $need->id }}"
                                       class="nav-link @if ($key == 0) active @endif"
                                       @if ($key == 0) aria-selected="true" @else aria-selected="false"
                                       @endif data-toggle="tab" role="tab" aria-controls="tab-content-{{ $need->id }}"
                                       id="tab-{{ $need->id }}">{{ $need->ru_title }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content mt-3" id="needsTabsContent">
                            @foreach($needs as $key => $need)
                                <div class="tab-pane fade @if($key == 0) show active @endif"
                                     id="tab-content-{{ $need->id }}" role="tabpanel"
                                     aria-labelledby="tab-{{ $need->id }}">
                                    <div class="row">
                                        @foreach($need->menuItems as $item)
                                            <div class="col-sm-12 col-md-3">
                                                <h5>{{ $item->ru_title }}</h5>
                                                <ul class="list-group list-group-flush">
                                                    @foreach($item->categories as $category)
                                                        <li class="list-group-item">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="categories[]"
                                                                       id="category-{{ $category->id }}"
                                                                       class="custom-control-input" value="{{ $category->id }}">
                                                                <label for="category-{{ $category->id }}"
                                                                       class="custom-control-label">{{ $category->getTitle() }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group mt-3">
                            <label for="description">Опишите проект подробнее</label>
                            <textarea name="description" id="description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="upload-avatar">
                            <div class="upload">
                                <div class="desc"><p>Если есть готовое задание или пожелания, обязательно прикрепите их
                                        сюда. Исполнители лучше поймут задачу и зададут минимум уточняющих вопросов, а вы
                                        сэкономите много времени.</p>
                                    <p>Максималльный размер: 50 MB    Максимальное количество файлов: 10</p></div>
                                <div class="btn-upload">
                                    <input type="file" name="file" id="file" multiple>
                                    <span class="btn btn-light-green">Прикрепить файлы</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="budget">Ориентировочный бюджет</label>
                                    <input type="text" name="budget" id="budget" class="form-control @error('budget') is-invalid @enderror" placeholder="Укажите ориентировочный бюджет в сумах..." value="{{ old('budget') }}">
                                </div>
                                <div class="form-group">
                                    <label for="deadline">Срок окончания приёма заявок</label>
                                    <input type="text" class="form-control" id="deadline" name="deadline" value="{{ old('deadline') }}">
                                </div>
                            </div>
                        </div>
                        @guest
                            <hr>
                            <div class="section-heading">
                                <h2 class="title">О вас</h2>
                            </div>
                            <div class="form-group">
                                <label for="">Вы являетесь:</label>
                                <div class="custom-control custom-radio" id="companyRadio">
                                    <input type="radio" name="client_type" value="company" id="companyRadioInput" class="custom-control-input" @if (!old('client_type')) checked @endif @if (old('client_type') == 'company') checked @endif>
                                    <label for="companyRadioInput" class="custom-control-label">Компанией</label>
                                </div>
                                <div class="custom-control custom-radio" id="privateRadio">
                                    <input type="radio" name="client_type" value="private" id="companyPrivateInput" class="custom-control-input" @if (old('client_type') == 'private') checked @endif>
                                    <label for="companyPrivateInput" class="custom-control-label">Частным лицом</label>
                                </div>
                            </div>
                            <div class="form-group company-name-block">
                                <label for="companyName">Название компании</label>
                                <input type="text" name="client_company_name" id="companyName" class="form-control" value="{{ old('client_company_name') }}">
                            </div>
                            <div class="form-group">
                                <label>Как вас зовут?</label>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" name="firstName" id="firstName" class="form-control" placeholder="Имя" value="{{ old('firstName') }}">
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" name="secondName" id="secondName" class="form-control" placeholder="Фамилия" value="{{ old('secondName') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Электронная почта</label>
                                <input type="email" name="client_email" id="email" class="form-control" placeholder="your@email.ru" value="{{ old('client_email') }}">
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Номер телефона</label>
                                <input type="text" name="client_phone_number" id="phone_number" class="form-control" placeholder="+ 998 9X XXX XX XX" value="{{ old('client_phone_number') }}">
                            </div>
                        @endguest
                        <div class="mb-30 mt-5">
                            <button class="btn btn-light-green"><i class="fas fa-share"></i>  Опубликовать конкурс</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script>ClassicEditor
            .create(document.querySelector('#description'), {

                toolbar: {
                    items: [
                        '|',
                        'bold',
                        'italic',
                        'link',
                        'bulletedList',
                        'numberedList',
                        '|',
                        '|',
                        'undo',
                        'redo'
                    ]
                },
                language: 'ru',
                licenseKey: '',
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr(document.getElementById('deadline'), {
                dateFormat: 'd.m.Y',
            });
            document.getElementById('companyRadio').addEventListener('click', function () {
                document.querySelectorAll('.company-name-block').forEach(function (element) {
                    element.classList.remove('d-none');
                });
            });
            document.getElementById('privateRadio').addEventListener('click', function () {
                document.querySelectorAll('.company-name-block').forEach(function (element) {
                    element.classList.add('d-none');
                });
            });
            document.querySelectorAll('.tender-type').forEach(function (element) {
                element.addEventListener('click', function () {
                    document.getElementById('tender-type-input').setAttribute('value', this.getAttribute('data-tender-type'));
                });
            })
        });
    </script>
@endsection
