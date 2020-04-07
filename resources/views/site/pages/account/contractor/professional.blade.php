@extends('site.layouts.account')

@section('title', 'Профессиональные данные')

@section('header')
    @include('site.layouts.partials.headers.default')
@endsection

@section('account.title.h1', 'Профессиональные данные')

@section('account.content')
    <form action="" method="post">
        @csrf
        <section class="box-admin edit-profile">
            <div class="header-box-admin">
                <h3>Специализация</h3>
            </div>
            <div class="accordion" id="parentCategoriesAccordion" role="tablist" aria-multiselectable="false">
                @foreach($categories as $category)
                    <div class="card">
                        <div class="card-header d-flex justify-content-between" role="tab" id="heading{{ $category->id }}">
                            <a href="#collapse{{ $category->id }}" class="d-block w-100" data-toggle="collapse" data-parent="#parentCategoriesAccordion" aria-expanded="true" aria-controls="collapse{{ $category->id }}"><span>{{ $category->getTitle() }}</span><i class="fas fa-caret-down"></i></a>
                        </div>
                        <div class="collapse" id="collapse{{ $category->id }}" role="tabpanel" aria-labelledby="heading{{ $category->id }}" data-parent="#parentCategoriesAccordion">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    @foreach($category->descendants as $child)
                                        <li class="list-group-item">
                                            <div class="custom-control custom-checkbox" id="category-{{ $child->id }}">
                                                <input type="checkbox" name="categories[{{ $child->id }}][id]" value="{{ $child->id }}" id="input-{{ $child->id }}"
                                                       class="custom-control-input" @if (in_array($child->id, $chosenSpecs)) checked @endif>
                                                <label id="input-{{ $child->id }}" class="custom-control-label">{{ $child->getTitle() }}</label>
                                            </div>
                                            <div class="row @if (!in_array($child->id, $chosenSpecs)) d-none @endif" id="category-{{ $child->id }}-prices">
                                                <div class="col-md-4">
                                                    <p class="mb-1 text-muted">Примерная стоимость услуги</p>
                                                    <input type="text" name="categories[{{ $child->id }}][price_from]" @if (in_array($child->id, $chosenSpecs)) value="{{ $user->categories()->find($child->id)->pivot->price_from }}" @endif class="price-control" style="width: 35%"> &mdash; <input
                                                        type="text" name="categories[{{ $child->id }}][price_to]" @if (in_array($child->id, $chosenSpecs)) value="{{ $user->categories()->find($child->id)->pivot->price_to }}" @endif class="price-control" style="width: 35%"> <span class="text-muted">сум</span>
                                                </div>
                                                <div class="col-md-3">
                                                    <p class="mb-1 text-muted">Стоимость в час</p>
                                                    <input type="text" name="categories[{{ $child->id }}][price_per_hour]" @if (in_array($child->id, $chosenSpecs)) value="{{ $user->categories()->find($child->id)->pivot->price_per_hour }}" @endif class="price-control" style="width: 60%"> <span class="text-muted">сум/час</span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-light-green mt-3 ml-3 mb-3"><i class="fas fa-save"></i> Сохранить</button>
        </section>
    </form>
{{--        <section class="uk-section-xsmall">--}}
{{--            <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top" uk-grid>--}}
{{--                <div class="wrapper_title">--}}
{{--                    <h4>Специализация</h4>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <ul uk-accordion>--}}
{{--                @foreach($categories as $category)--}}
{{--                    <li @if(!empty(array_intersect($category->descendants()->pluck('id')->toArray(), $chosenSpecs))) class="uk-open" @endif>--}}
{{--                        <a href="#" class="uk-accordion-title">{{ $category->getTitle() }}</a>--}}
{{--                        <div class="uk-accordion-content">--}}
{{--                            <ul class="uk-list uk-margin-medium-left">--}}
{{--                                @foreach($category->descendants as $child)--}}
{{--                                    <li>--}}
{{--                                        <label><input type="checkbox" name="specializations[{{ $child->id }}][id]"--}}
{{--                                                      id="spec-{{ $child->id }}" value="{{ $child->id }}"--}}
{{--                                                      class="uk-checkbox" @if(in_array($child->id, $chosenSpecs)) checked @endif> {{ $child->getTitle() }}</label>--}}
{{--                                        <div class="uk-grid @if (!in_array($child->id, $chosenSpecs)) uk-hidden @endif" id="spec-{{ $child->id }}-prices">--}}
{{--                                            <div class="uk-width-3-5">--}}
{{--                                                <p class="uk-padding-remove uk-margin-small-bottom uk-text-muted uk-text-xsmall">--}}
{{--                                                    Примерная стоимость услуги</p>--}}
{{--                                                <input type="text" name="specializations[{{ $child->id }}][minPrice]" id="" @if (isset($specializations[$child->id]))value="{{ $specializations[$child->id]['maxPrice'] }}" @endif class="uk-inline uk-input price-input"><span> — </span><input--}}
{{--                                                    type="text" name="specializations[{{ $child->id }}][maxPrice]" id="" @if (isset($specializations[$child->id]))value="{{ $specializations[$child->id]['minPrice'] }}" @endif--}}
{{--                                                    class="uk-inline uk-input price-input"><span> сум</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="uk-width-2-5">--}}
{{--                                                <p class="uk-padding-remove uk-margin-small-bottom uk-text-muted uk-text-xsmall">--}}
{{--                                                    Стоимость часа</p>--}}
{{--                                                <input type="text" name="specializations[{{ $child->id }}][pricePerHouse]" @if (isset($specializations[$child->id]))value="{{ $specializations[$child->id]['pricePerHouse'] }}" @endif--}}
{{--                                                       class="uk-inline uk-input price-input"><span> сум/час</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--            <div class="uk-grid">--}}
{{--                <button type="submit" class="uk-button uk-button-success uk-width-1-1 uk-margin-medium-left">Сохранить--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </section>--}}
@endsection

@section('js')
    <script src="{{ asset('js/account.professional.js') }}"></script>
@endsection
