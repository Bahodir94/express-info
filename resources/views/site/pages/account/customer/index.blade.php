@extends('site.layouts.account')

@section('title', 'Профиль компании')

@section('header')
    @include('site.layouts.partials.headers.default')
@endsection

@section('css')
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/ckeditor.css') }}">
@endsection
@section('account.title', 'Профиль компании')

@section('content.account')
    <form action="{{ route('site.account.customer.company.save') }}" method="post" enctype="multipart/form-data">
        @csrf
        <section class="uk-section-xsmall">
            <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top" uk-grid>
                <div class="wrapper_title">
                    <h4>Фото профиля</h4>
                </div>
            </div>
            <div class="uk-grid">
                <div class="uk-width-1-4">
                    <img src="{{ $user->getImage() }}" alt="{{ $user->name }}" class="uk-border-circle account-avatar">
                </div>
                <div class="uk-width-3-4">
                    <div class="uk-flex uk-flex-column uk-flex-center">
                        <div class="js-upload" uk-form-custom>
                            <input type="file" name="image" id="image">
                            <button class="uk-button uk-button-primary-outline" type="button" tabindex="-1"><span
                                    uk-icon="image" class="uk-margin-small-right"></span>Загрузить фото
                            </button>
                        </div>
                        <span class="uk-text-muted uk-text-small uk-margin-small-top"><span uk-icon="info"></span> Минимальные пропорции: 120х120 пикселей</span>
                    </div>
                </div>
            </div>
            <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top" uk-grid>
                <div class="wrapper_title">
                    <h4>Название компании: <span class="uk-text-danger">*</span></h4>
                </div>
            </div>
            <div class="uk-grid uk-margin-remove-top">
                <div class="uk-width-1-1">
                    <input type="text" placeholder="Название компании" name="company_name"
                           class="uk-input @error('company_name') uk-form-danger @enderror"
                           value="{{ $user->company_name }}">
                </div>
            </div>
            <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top" uk-grid>
                <div class="wrapper_title">
                    <h4>Год основания</h4>
                </div>
            </div>
            <div class="uk-grid uk-margin-remove-top">
                <div class="uk-width-1-1">
                    <input type="text" placeholder="Год основания" name="foundation_year"
                           class="uk-input @error('foundation_year') uk-form-danger @enderror"
                           value="{{ $user->foundation_year }}">
                </div>
            </div>
            <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top" uk-grid>
                <div class="wrapper_title">
                    <h4>О компании:</h4>
                </div>
            </div>
            <div class="uk-grid uk-margin-remove-top">
                <div class="uk-width-1-1">
                    <textarea name="about_myself" id="aboutMySelf">{!! $user->about_myself !!}</textarea>
                </div>
            </div>
            <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top" uk-grid>
                <div class="wrapper_title">
                    <h4>Ваш сайт</h4>
                </div>
            </div>
            <div class="uk-grid uk-margin-remove-top">
                <div class="uk-width-1-1">
                    <input type="text" placeholder="Ваш сайт" name="site"
                           class="uk-input @error('site') uk-form-danger @enderror"
                           value="{{ $user->site }}">
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
                           class="uk-input @error('phone_number') uk-form-danger @enderror"
                           value="{{ $user->phone_number }}">
                </div>
                <div class="uk-width-1-2">
                    <input type="text" placeholder="Email" name="email"
                           class="uk-input @error('email') uk-form-danger @enderror"
                           value="{{ $user->email }}">
                </div>
            </div>
            <div class="uk-grid">
                <button type="submit" class="uk-button uk-button-success uk-width-1-1 uk-margin-medium-left">Сохранить
                </button>
            </div>
        </section>
    </form>
@endsection

@section('js')
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script>ClassicEditor
            .create(document.querySelector('#aboutMySelf'), {

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
@endsection
