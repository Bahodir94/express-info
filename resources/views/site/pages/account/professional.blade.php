@extends('site.layouts.account')

@section('title', 'Профессиональные данные')

@section('header')
    @include('site.layouts.partials.headers.default')
@endsection

@section('account.title', 'Профессиональные данные')

@section('content.account')
    <form action="" method="post">
        @csrf
        <section class="uk-section-xsmall">
            <div class="wrapper uk-padding-small uk-padding-remove-horizontal uk-flex-middle uk-margin-top" uk-grid>
                <div class="wrapper_title">
                    <h4>Специализация</h4>
                </div>
            </div>
            <ul uk-accordion>
                @foreach($categories as $category)
                    <li @if(!empty(array_intersect($category->descendants()->pluck('id')->toArray(), $chosenSpecs))) class="uk-open" @endif>
                        <a href="#" class="uk-accordion-title">{{ $category->getTitle() }}</a>
                        <div class="uk-accordion-content">
                            <ul class="uk-list uk-margin-medium-left">
                                @foreach($category->descendants as $child)
                                    <li>
                                        <label><input type="checkbox" name="specializations[{{ $child->id }}][id]"
                                                      id="spec-{{ $child->id }}" value="{{ $child->id }}"
                                                      class="uk-checkbox" @if(in_array($child->id, $chosenSpecs)) checked @endif> {{ $child->getTitle() }}</label>
                                        <div class="uk-grid @if (!in_array($child->id, $chosenSpecs)) uk-hidden @endif" id="spec-{{ $child->id }}-prices">
                                            <div class="uk-width-3-5">
                                                <p class="uk-padding-remove uk-margin-small-bottom uk-text-muted uk-text-xsmall">
                                                    Примерная стоимость услуги</p>
                                                <input type="text" name="specializations[{{ $child->id }}][minPrice]" id="" @if (isset($specializations[$child->id]))value="{{ $specializations[$child->id]['maxPrice'] }}" @endif class="uk-inline uk-input price-input"><span> — </span><input
                                                    type="text" name="specializations[{{ $child->id }}][maxPrice]" id="" @if (isset($specializations[$child->id]))value="{{ $specializations[$child->id]['minPrice'] }}" @endif
                                                    class="uk-inline uk-input price-input"><span> сум</span>
                                            </div>
                                            <div class="uk-width-2-5">
                                                <p class="uk-padding-remove uk-margin-small-bottom uk-text-muted uk-text-xsmall">
                                                    Стоимость часа</p>
                                                <input type="text" name="specializations[{{ $child->id }}][pricePerHouse]" @if (isset($specializations[$child->id]))value="{{ $specializations[$child->id]['pricePerHouse'] }}" @endif
                                                       class="uk-inline uk-input price-input"><span> сум/час</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="uk-grid">
                <button type="submit" class="uk-button uk-button-success uk-width-1-1 uk-margin-medium-left">Сохранить
                </button>
            </div>
        </section>
    </form>
@endsection

@section('js')
    <script src="{{ asset('js/account.professional.js') }}"></script>
@endsection
