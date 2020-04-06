@extends('site.layouts.app')

@section('title', 'Исполнители')

@section('header')
    @include('site.layouts.partials.headers.default')
@endsection

@section('content')
    <section class="categories-section">
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="title">Исполнители</h2>
                <p class="mt-3">В нашем каталоге собраны digital-агенства и специалисты-фрилансеры. Выберите нужный раздел каталога и
                    отберите подходящих вам Исполнителей.</p>
            </div>
            <div class="content-main-right">
                @foreach($categories as $category)
                    <div class="category-item job-item">
                        <div class="row no-gutters">
                            <h3 class="title-job w-100"><a
                                    href="{{ route('site.catalog.main', $category->getAncestorsSlugs()) }}" class="text-center w-100 d-block">{{ $category->getTitle() }}</a></h3>
                        </div>
                        <div class="d-flex justify-content-center category-children__list">
                            @foreach($category->categories as $child)
                                <a href="{{ route('site.catalog.main', $child->getAncestorsSlugs()) }}"><span class="badge badge-primary category-badge">{{ $child->getTitle() }}</span></a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
