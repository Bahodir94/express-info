@extends('site.layouts.account')

@section('title', 'Мои конкурсы')

@section('header')
    @include('site.layouts.partials.headers.default')
@endsection

@section('account.title.h1', 'Мои конкурсы')

@section('account.content')
    <section class="box-admin">
        <div class="header-box-admin">
            <h3>Мои заявки на конкурсы</h3>
        </div>
        <div class="body-box-admin p-0">
            <div class="table-responsive">
                <table class="table tbl-job">
                    <thead>
                        <tr>
                            <th>Название проекта</th>
                            <th class="d-none d-xl-table-cell text-center">Локация</th>
                            <th class="d-none d-xl-table-cell text-center">Категории</th>
                            <th class="d-none d-xl-table-cell text-center">Статус</th>
                            <th class="d-none d-md-table-cell text-right">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user->requests as $request)
                            <tr class="my-job-item">
                                <td>
                                    <h3 class="title-job"><a href="{{ route('site.tenders.category', $request->tender->slug) }}">{{ $request->tender->title }}</a></h3>
                                    <div class="meta-job"><span> <i class="fas fa-calendar-alt"></i>Опубликован {{ $request->tender->created_at->format('d.m.Y') }}</span><span> <i
                                                class="fas fa-calendar-alt"></i>Истекает {{ $request->tender->deadline }}</span></div>
                                    <div class="salary-job"><i class="fas fa-money-bill-alt"></i>{{ $request->tender->budget }} сум
                                    </div>
                                    <div class="job-info d-xl-none"><span
                                            class="number-application">Ташкент</span>@foreach($request->tender->categories as $category) <span>{{ $category->getTitle() }} </span>@endforeach<span
                                            class="active">@if($request->tender->contractor_id == $request->user_id) Активный @else В ожидании @endif </span></div>
                                    <div class="job-func d-md-none">
                                        <form action="{{ route('site.tenders.requests.cancel') }}" method="post" class="ml-1">
                                            @csrf
                                            <input type="hidden" name="requestId" value="{{ $request->id }}">
                                            <button type="submit" onclick="return confirm('Вы уверены, что хотите отменить заявку на конкурс {{ $request->tender->title }}?')" data-toggle="tooltip" data-placement="top" title="Отменить заявку" class="btn btn-light btn-delete"><i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                <td class="d-none d-xl-table-cell text-center number-application">Ташкент</td>
                                <td class="d-none d-xl-table-cell text-center">@foreach($request->tender->categories as $category) <div>{{ $category->getTitle() }} </div>@endforeach</td>
                                <td class="d-none d-xl-table-cell text-center active">@if($request->tender->contractor_id == $request->user_id) Активный @else В ожидании @endif</td>
                                <td class="d-none d-md-table-cell text-right">
                                    <form action="{{ route('site.tenders.requests.cancel') }}" method="post" class="ml-1">
                                        @csrf
                                        <input type="hidden" name="requestId" value="{{ $request->id }}">
                                        <button type="submit" onclick="return confirm('Вы уверены, что хотите отменить заявку на конкурс {{ $request->tender->title }}?')" data-toggle="tooltip" data-placement="top" title="Отменить заявку" class="btn btn-light btn-delete"><i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
