@extends('site.layouts.app')

@section('title', 'Создать тендер')

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
    <div class="uk-container uk-container-xlarge uk-container-center">
        <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top" uk-grid>
            <div class="wrapper_title">
                <h1>Организуйте тендер бесплатно за 5 минут</h1>
            </div>
            <p>Наша система сама подберет вам исполнителей на услуги связанные с разработкой сайта: от прототипирования
                и дизайна до программирования и тестирования.</p>
            <p>Вы можете сделать тендер открытым для всех или выбрать участников тендера самостоятельно.</p>
        </div>

        <form action="" method="post" class="uk-section-xsmall" enctype="multipart/form-data">
            <input type="hidden" name="need_id" id="tender-type-input" value="{{ $needs[0]->id }}">
            @csrf
            <ul class="uk-tab" data-uk-tab="{connect: '#tabsContent'}">
                @foreach($needs as $need)
                    <li><a href="" class="tender-type" data-tender-type="{{ $need->id }}">{{ $need->getTitle() }}</a></li>
                @endforeach
            </ul>
            <ul id="tabsContent" class="uk-switcher uk-margin">
                <li>
                    <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top"
                         uk-grid>
                        <div class="wrapper_title">
                            <h4>Выберите услугу *</h4>
                        </div>
                    </div>
                    <ul uk-accordion>
                        @foreach($needs[0]->menuItems as $item)
                            <li>
                                <a href="#" class="uk-accordion-title">{{ $item->ru_title }}</a>
                                <div class="uk-accordion-content uk-margin-left">
                                    @foreach($item->categories as $category)
                                        <label class="uk-display-block uk-margin-small-bottom"><input type="checkbox"
                                                                                                      name="categories[]"
                                                                                                      value="{{ $category->id }}"
                                                                                                      class="uk-checkbox"> {{ $category->getTitle() }}
                                        </label>
                                    @endforeach
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top"
                         uk-grid>
                        <div class="wrapper_title">
                            <h4>Что требуется сделать?</h4>
                        </div>
                    </div>
                    <div class="uk-grid uk-margin-remove-top">
                        <div class="uk-width-1-1">
                            <input type="text" placeholder="Название проекта" name="title"
                                   class="uk-input @error('title') uk-form-danger @enderror">
                        </div>
                    </div>
                    <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top"
                         uk-grid>
                        <div class="wrapper_title">
                            <h4>Расскажите о задаче подробнее <span class="uk-text-danger">*</span></h4>
                        </div>
                    </div>
                    <div class="uk-grid uk-margin-remove-top">
                        <div class="uk-width-1-1">
                            <textarea name="description" id="description"></textarea>
                        </div>
                    </div>
                    <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top"
                         uk-grid>
                        <div class="uk-grid">
                            <div class="uk-width-4-5">
                                <p>Если есть готовое задание или пожелания, обязательно прикрепите их сюда.
                                    Исполнители лучше поймут задачу и зададут минимум уточняющих вопросов, а вы
                                    сэкономите много времени.</p>
                            </div>
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-between">
                        <div class="js-upload" uk-form-custom>
                            <input type="file" name="files[]" id="files" multiple>
                            <button class="uk-button uk-button-primary-outline" type="button" tabindex="-1"><span
                                    uk-icon="image" class="uk-margin-small-right"></span>Прикрепить файлы
                            </button>
                        </div>
                        <span class="uk-text-muted uk-text-small uk-margin-small-top"><span uk-icon="info"
                                                                                            class="uk-margin-small-right"></span>Максимальный размер: 100 MB  Максимальное количество файлов: 10</span>
                    </div>
                    <ul uk-accordion class="uk-margin-medium-top uk-margin-small-bottom">
                        <li>
                            <a href="#" class="uk-accordion-title" id="additionalInfo">Дополнительные вопросы</a>
                            <div class="uk-accordion-content">
                                <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle"
                                     uk-grid>
                                    <div class="wrapper_title">
                                        <h4>Кто ваша целевая аудитория?</h4>
                                    </div>
                                </div>
                                <div class="uk-grid uk-margin-remove-top">
                                    <div class="uk-width-1-1">
                                            <textarea name="target_audience" id="target_audience" class="uk-textarea"
                                                      rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle"
                                     uk-grid>
                                    <div class="wrapper_title">
                                        <h4>Ссылки на сайты конкурентов</h4>
                                    </div>
                                </div>
                                <div class="uk-grid uk-margin-remove-top">
                                    <div class="uk-width-1-1">
                                        <textarea name="links" id="links" class="uk-textarea" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle"
                                     uk-grid>
                                    <div class="wrapper_title">
                                        <h4>Дполнительная информация</h4>
                                    </div>
                                </div>
                                <div class="uk-grid uk-margin-remove-top">
                                    <div class="uk-width-1-1">
                                            <textarea name="additional_info" id="additional_info" class="uk-textarea"
                                                      rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="uk-grid">
                        <div class="uk-width-4-5">
                            <p id="additionalInfoHelper">
                                Пожалуйста, ответьте на следующие вопросы. Это не обязательно, но так вы получите
                                более качественные продуманные предложения от исполнителей, которые понимают задачу
                                и способны её решить, а не просто нуждаются в работе.
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top"
                         uk-grid>
                        <div class="wrapper_title">
                            <h4>Выберите услугу *</h4>
                        </div>
                    </div>
                    <ul uk-accordion>
                        @foreach($needs[1]->menuItems as $item)
                            <li>
                                <a href="#" class="uk-accordion-title">{{ $item->ru_title }}</a>
                                <div class="uk-accordion-content uk-margin-left">
                                    @foreach($item->categories as $category)
                                        <label class="uk-display-block uk-margin-small-bottom"><input type="checkbox"
                                                                                                      name="categories[]"
                                                                                                      value="{{ $category->id }}"
                                                                                                      class="uk-checkbox"> {{ $category->getTitle() }}
                                        </label>
                                    @endforeach
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top"
                         uk-grid>
                        <div class="wrapper_title">
                            <h4>Что требуется сделать?</h4>
                        </div>
                    </div>
                    <div class="uk-grid uk-margin-remove-top">
                        <div class="uk-width-1-1">
                            <input type="text" placeholder="Название проекта" name="title"
                                   class="uk-input @error('title') uk-form-danger @enderror">
                        </div>
                    </div>
                    <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top"
                         uk-grid>
                        <div class="wrapper_title">
                            <h4>Расскажите о задаче подробнее <span class="uk-text-danger">*</span></h4>
                        </div>
                    </div>
                    <div class="uk-grid uk-margin-remove-top">
                        <div class="uk-width-1-1">
                            <textarea name="description" id="description-marketing"></textarea>
                        </div>
                    </div>
                    <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top"
                         uk-grid>
                        <div class="uk-grid">
                            <div class="uk-width-4-5">
                                <p>Если есть готовое задание или пожелания, обязательно прикрепите их сюда.
                                    Исполнители лучше поймут задачу и зададут минимум уточняющих вопросов, а вы
                                    сэкономите много времени.</p>
                            </div>
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-between">
                        <div class="js-upload" uk-form-custom>
                            <input type="file" name="files[]" id="files" multiple>
                            <button class="uk-button uk-button-primary-outline" type="button" tabindex="-1"><span
                                    uk-icon="image" class="uk-margin-small-right"></span>Прикрепить файлы
                            </button>
                        </div>
                        <span class="uk-text-muted uk-text-small uk-margin-small-top"><span uk-icon="info"
                                                                                            class="uk-margin-small-right"></span>Максимальный размер: 100 MB  Максимальное количество файлов: 10</span>
                    </div>
                </li>
                <li>
                    <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top"
                         uk-grid>
                        <div class="wrapper_title">
                            <h4>Выберите услугу *</h4>
                        </div>
                    </div>
                    <ul uk-accordion>
                        @foreach($needs[2]->menuItems as $item)
                            <li>
                                <a href="#" class="uk-accordion-title">{{ $item->ru_title }}</a>
                                <div class="uk-accordion-content uk-margin-left">
                                    @foreach($item->categories as $category)
                                        <label class="uk-display-block uk-margin-small-bottom"><input type="checkbox"
                                                                                                      name="categories[]"
                                                                                                      value="{{ $category->id }}"
                                                                                                      class="uk-checkbox"> {{ $category->getTitle() }}
                                        </label>
                                    @endforeach
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top"
                         uk-grid>
                        <div class="wrapper_title">
                            <h4>Что требуется сделать?</h4>
                        </div>
                    </div>
                    <div class="uk-grid uk-margin-remove-top">
                        <div class="uk-width-1-1">
                            <input type="text" placeholder="Название проекта" name="title"
                                   class="uk-input @error('title') uk-form-danger @enderror">
                        </div>
                    </div>
                    <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top"
                         uk-grid>
                        <div class="wrapper_title">
                            <h4>Расскажите о задаче подробнее <span class="uk-text-danger">*</span></h4>
                        </div>
                    </div>
                    <div class="uk-grid uk-margin-remove-top">
                        <div class="uk-width-1-1">
                            <textarea name="description" id="description-multimedia"></textarea>
                        </div>
                    </div>
                    <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top"
                         uk-grid>
                        <div class="uk-grid">
                            <div class="uk-width-4-5">
                                <p>Если есть готовое задание или пожелания, обязательно прикрепите их сюда.
                                    Исполнители лучше поймут задачу и зададут минимум уточняющих вопросов, а вы
                                    сэкономите много времени.</p>
                            </div>
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-between">
                        <div class="js-upload" uk-form-custom>
                            <input type="file" name="files[]" id="files" multiple>
                            <button class="uk-button uk-button-primary-outline" type="button" tabindex="-1"><span
                                    uk-icon="image" class="uk-margin-small-right"></span>Прикрепить файлы
                            </button>
                        </div>
                        <span class="uk-text-muted uk-text-small uk-margin-small-top"><span uk-icon="info"
                                                                                            class="uk-margin-small-right"></span>Максимальный размер: 100 MB  Максимальное количество файлов: 10</span>
                    </div>
                </li>
                <li>
                    <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top"
                         uk-grid>
                        <div class="wrapper_title">
                            <h4>Выберите услугу *</h4>
                        </div>
                    </div>
                    <ul uk-accordion>
                        @foreach($needs[3]->menuItems as $item)
                            <li>
                                <a href="#" class="uk-accordion-title">{{ $item->ru_title }}</a>
                                <div class="uk-accordion-content uk-margin-left">
                                    @foreach($item->categories as $category)
                                        <label class="uk-display-block uk-margin-small-bottom"><input type="checkbox"
                                                                                                      name="categories[]"
                                                                                                      value="{{ $category->id }}"
                                                                                                      class="uk-checkbox"> {{ $category->getTitle() }}
                                        </label>
                                    @endforeach
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top"
                         uk-grid>
                        <div class="wrapper_title">
                            <h4>Что требуется сделать?</h4>
                        </div>
                    </div>
                    <div class="uk-grid uk-margin-remove-top">
                        <div class="uk-width-1-1">
                            <input type="text" placeholder="Название проекта" name="title"
                                   class="uk-input @error('title') uk-form-danger @enderror">
                        </div>
                    </div>
                    <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top"
                         uk-grid>
                        <div class="wrapper_title">
                            <h4>Расскажите о задаче подробнее <span class="uk-text-danger">*</span></h4>
                        </div>
                    </div>
                    <div class="uk-grid uk-margin-remove-top">
                        <div class="uk-width-1-1">
                            <textarea name="description" id="description-text"></textarea>
                        </div>
                    </div>
                    <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top"
                         uk-grid>
                        <div class="uk-grid">
                            <div class="uk-width-4-5">
                                <p>Если есть готовое задание или пожелания, обязательно прикрепите их сюда.
                                    Исполнители лучше поймут задачу и зададут минимум уточняющих вопросов, а вы
                                    сэкономите много времени.</p>
                            </div>
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-between">
                        <div class="js-upload" uk-form-custom>
                            <input type="file" name="files[]" id="files" multiple>
                            <button class="uk-button uk-button-primary-outline" type="button" tabindex="-1"><span
                                    uk-icon="image" class="uk-margin-small-right"></span>Прикрепить файлы
                            </button>
                        </div>
                        <span class="uk-text-muted uk-text-small uk-margin-small-top"><span uk-icon="info"
                                                                                            class="uk-margin-small-right"></span>Максимальный размер: 100 MB  Максимальное количество файлов: 10</span>
                    </div>
                </li>
                <li>
                    <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top"
                         uk-grid>
                        <div class="wrapper_title">
                            <h4>Выберите услугу *</h4>
                        </div>
                    </div>
                    <ul uk-accordion>
                        @foreach($needs[4]->menuItems as $item)
                            <li>
                                <a href="#" class="uk-accordion-title">{{ $item->ru_title }}</a>
                                <div class="uk-accordion-content uk-margin-left">
                                    @foreach($item->categories as $category)
                                        <label class="uk-display-block uk-margin-small-bottom"><input type="checkbox"
                                                                                                      name="categories[]"
                                                                                                      value="{{ $category->id }}"
                                                                                                      class="uk-checkbox"> {{ $category->getTitle() }}
                                        </label>
                                    @endforeach
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top"
                         uk-grid>
                        <div class="wrapper_title">
                            <h4>Что требуется сделать?</h4>
                        </div>
                    </div>
                    <div class="uk-grid uk-margin-remove-top">
                        <div class="uk-width-1-1">
                            <input type="text" placeholder="Название проекта" name="title"
                                   class="uk-input @error('title') uk-form-danger @enderror">
                        </div>
                    </div>
                    <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top"
                         uk-grid>
                        <div class="wrapper_title">
                            <h4>Расскажите о задаче подробнее <span class="uk-text-danger">*</span></h4>
                        </div>
                    </div>
                    <div class="uk-grid uk-margin-remove-top">
                        <div class="uk-width-1-1">
                            <textarea name="description" id="description-business"></textarea>
                        </div>
                    </div>
                    <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top"
                         uk-grid>
                        <div class="uk-grid">
                            <div class="uk-width-4-5">
                                <p>Если есть готовое задание или пожелания, обязательно прикрепите их сюда.
                                    Исполнители лучше поймут задачу и зададут минимум уточняющих вопросов, а вы
                                    сэкономите много времени.</p>
                            </div>
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-between">
                        <div class="js-upload" uk-form-custom>
                            <input type="file" name="files[]" id="files" multiple>
                            <button class="uk-button uk-button-primary-outline" type="button" tabindex="-1"><span
                                    uk-icon="image" class="uk-margin-small-right"></span>Прикрепить файлы
                            </button>
                        </div>
                        <span class="uk-text-muted uk-text-small uk-margin-small-top"><span uk-icon="info"
                                                                                            class="uk-margin-small-right"></span>Максимальный размер: 100 MB  Максимальное количество файлов: 10</span>
                    </div>
                </li>
            </ul>
            <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle" uk-grid>
                <div class="wrapper_title">
                    <h4>На какой примерно бюджет вы рассчитываете? *</h4>
                </div>
            </div>
            <div class="uk-grid uk-child-width-1-4">
                <input type="hidden" name="budget" id="budget" value="light">
                <div
                    class="uk-card uk-price-card uk-card-primary uk-padding-remove-left uk-text-center uk-card-hover"
                    data-budget="light">
                    <div class="uk-card-body">
                        <h4 class="uk-card-title">До 60 000 руб.</h4>
                    </div>
                    <div class="uk-card-footer uk-margin-medium-top"><p>Эконом</p></div>
                </div>
                <div class="uk-card uk-price-card uk-padding-remove-left uk-text-center uk-card-hover"
                     data-budget="medium">
                    <div class="uk-card-body"><h4 class="uk-card-title">60 000 - 120 000 руб.</h4></div>
                    <div class="uk-card-footer uk-margin-medium-top"><p>Средний</p></div>

                </div>
                <div class="uk-card uk-price-card uk-padding-remove-left uk-text-center uk-card-hover"
                     data-budget="business">
                    <div class="uk-card-body"><h4 class="uk-card-title">120 000 - 180 000 руб.</h4></div>
                    <div class="uk-card-footer uk-margin-medium-top"><p>Бизнес</p></div>

                </div>
                <div class="uk-card uk-price-card uk-padding-remove-left uk-text-center uk-card-hover"
                     data-budget="premium">
                    <div class="uk-card-body uk-text-center"><h4 class="uk-card-title">от 180 000 руб.</h4>
                    </div>
                    <div class="uk-card-footer uk-margin-medium-top"><p>Премиум</p></div>
                </div>
            </div>
            <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle" uk-grid>
                <div class="wrapper_title">
                    <h4>Срок окончания приёма заявок *</h4>
                    <div class="uk-grid">
                        <div class="uk-width-3-5"><p class="uk-text-muted">Дайте исполнителям 1-2 недели.
                                Так у них будет время подготовиться, и вы получите более продуманные
                                предложения.</p></div>
                    </div>
                </div>
            </div>
            <div class="uk-grid uk-margin-remove-top">
                <div class="uk-width-1-2">
                    <div class="uk-inline" style="width: 100%">
                        <span class="uk-form-icon" uk-icon="icon: calendar"></span>
                        <input type="text" class="uk-input" id="deadline" name="deadline">
                    </div>
                </div>
            </div>
            <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle" uk-grid>
                <div class="wrapper_title">
                    <h3>О вас</h3>
                </div>
            </div>
            <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-remove-top"
                 uk-grid>
                <div class="wrapper_title">
                    <h4>Вы являетесь</h4>
                </div>
            </div>
            <div class="uk-grid uk-child-width-1-1 uk-margin-remove-top">
                <label class="uk-display-block uk-margin-small-bottom" id="companyRadio"><input type="radio" name="client_type"
                                                                              class="uk-radio" value="company" checked>Компанией</label>
                <label class="uk-display-block" id="privateRadio"><input
                        type="radio" name="client_type" class="uk-radio" value="private">Частным лицом</label>
            </div>
            <div
                class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top company-name-block"
                uk-grid>
                <div class="wrapper_title">
                    <h4>Название компании: <span class="uk-text-danger">*</span></h4>
                </div>
            </div>
            <div class="uk-grid uk-margin-remove-top company-name-block">
                <div class="uk-width-1-1">
                    <input type="text" placeholder="Название компании" name="client_company_name"
                           class="uk-input @error('client_company_name') uk-form-danger @enderror">
                </div>
            </div>
            <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top" uk-grid>
                <div class="wrapper_title">
                    <h4>Ваш сайт</h4>
                </div>
            </div>
            <div class="uk-grid uk-margin-remove-top">
                <div class="uk-width-1-1">
                    <input type="text" placeholder="Ваш сайт" name="client_site_url"
                           class="uk-input @error('client_site_url') uk-form-danger @enderror">
                </div>
            </div>
            <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top" uk-grid>
                <div class="wrapper_title">
                    <h4>Ваше имя: <span class="uk-text-danger">*</span></h4>
                </div>
            </div>
            <div class="uk-grid uk-margin-remove-top">
                <div class="uk-width-1-2">
                    <input type="text" placeholder="Имя" name="firstName"
                           class="uk-input @error('firstName') uk-form-danger @enderror">
                </div>
                <div class="uk-width-1-2">
                    <input type="text" placeholder="Фамилия" name="secondName"
                           class="uk-input @error('secondName') uk-form-danger @enderror">
                </div>
            </div>
            <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top" uk-grid>
                <div class="wrapper_title">
                    <h4>Телефон и Email: <span class="uk-text-danger">*</span></h4>
                </div>
            </div>
            <div class="uk-grid uk-margin-remove-top">
                <div class="uk-width-1-2">
                    <input type="text" placeholder="Телефон" name="phone_number"
                           class="uk-input @error('client_phone_number') uk-form-danger @enderror">
                </div>
                <div class="uk-width-1-2">
                    <input type="text" placeholder="Email" name="email"
                           class="uk-input @error('email') uk-form-danger @enderror">
                </div>
            </div>
            <div class="uk-grid">
                <button type="submit"
                        class="uk-button uk-button-success uk-width-1-1 uk-margin-medium-left">Сохранить
                </button>
            </div>
        </form>
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
        ClassicEditor
            .create(document.querySelector('#description-marketing'), {

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
        ClassicEditor
            .create(document.querySelector('#description-multimedia'), {

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
        ClassicEditor
            .create(document.querySelector('#description-text'), {

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
        ClassicEditor
            .create(document.querySelector('#description-business'), {

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
            document.getElementById('additionalInfo').addEventListener('click', function () {
                document.getElementById('additionalInfoHelper').classList.toggle('uk-hidden');
            });
            let priceCards = document.querySelectorAll('.uk-price-card');
            priceCards.forEach(function (card) {
                card.addEventListener('click', function () {
                    document.querySelector('.uk-price-card.uk-card-primary').classList.remove('uk-card-primary');
                    this.classList.add('uk-card-primary');
                    document.getElementById('budget').setAttribute('value', this.getAttribute('data-budget'));
                });
            });
            document.getElementById('companyRadio').addEventListener('click', function () {
                console.log(this);
                document.querySelectorAll('.company-name-block').forEach(function (element) {
                    element.classList.remove('uk-hidden');
                });
            });
            document.getElementById('privateRadio').addEventListener('click', function () {
                document.querySelectorAll('.company-name-block').forEach(function (element) {
                    element.classList.add('uk-hidden');
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
