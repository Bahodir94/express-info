@extends('site.layouts.account')

@section('title', 'Кандидаты')

@section('header')
    @include('site.layouts.partials.headers.default')
@endsection

@section('account.title.h1', $tender->title)

@section('account.content')
    <section class="box-admin">
        <div class="header-box-admin">
            <h3>{{ $tender->requests()->count() }} заявок</h3>
        </div>
        <div class="body-box-admin p-0">
            <div class="table-responsive">
                <table class="table tbl-job">
                    <thead>
                    <tr>
                        <th>Кандидат</th>
                        <th class="d-none d-xl-table-cell text-center">Предложенный срок</th>
                        <th class="d-none d-xl-table-cell text-center text-nowrap">Предложенный бюджет</th>
                        <th class="d-none d-md-table-cell text-right">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tender->requests as $request)
                        <tr class="my-job-item candidate">
                            <td>
                                <div class="candidate-tile">
                                    <div class="img"><img src="{{ $request->user->getImage() }}" alt="{{ $request->user->getCommonTitle() }}">
                                    </div>
                                    <div class="text">
                                        <h3 class="title-job"><a href="{{ route('site.contractors.show', $request->user->slug) }}">{{ $request->user->getCommonTitle() }}</a></h3>
                                        <div class="date-job"><i class="fas fa-check-circle"></i> @if ($request->user->cotractor_type == 'agency') Digital-агенство @else Фрилансер @endif </div>
                                    </div>
                                </div>
                                <div class="job-info-mobile d-xl-none">
                                    <ul>
                                        <li><strong>Сроки: </strong>{{ $request->period_from }} - {{ $request->period_to }}
                                        </li>
                                        <li><strong>Бюджет: </strong>{{ $request->budget_from }} - {{ $request->budget_to }}</li>
                                    </ul>
                                    <div class="job-func d-md-none">
                                        <button class="btn btn-light btn-new"><i class="far fa-сheck"></i>
                                        </button>
                                        <button class="btn btn-light btn-edit"><i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button class="btn btn-light btn-delete"><i
                                                class="far fa-trash-alt"></i></button>
                                    </div>
                                </div>
                            </td>
                            <td class="d-none d-xl-table-cell text-center" style="width: 100%">{{ $request->period_from }} - {{ $request->period_to }} дней</td>
                            <td class="d-none d-xl-table-cell text-center">от {{ $request->budget_from }} сум до {{ $request->budget_to }} сум</td>
                            <td class="d-none d-md-table-cell text-right">
                                <div class="d-flex">
                                    <a class="btn btn-light btn-edit"><i class="fas fa-check"></i></a>
                                    <form action="{{ route('site.tenders.requests.cancel', $tender->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="requestId" value="{{ $request->id }}">
                                        <input type="hidden" name="redirect_to" value="{{ route('site.account.tenders.candidates', $tender->slug) }}">
                                        <button type="submit" onclick="return confirm('Вы уверены, что хотите отклонить кандидата {{ $request->user->getCommonTitle() }}?')" class="btn btn-light btn-delete"><i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
