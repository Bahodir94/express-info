<!-- Search section -->
<section class="uk-section-xsmall">
    <div class="uk-container uk-container-expand uk-container-center">
        <form action="{{ route('site.catalog.search') }}" method="post" class="uk-center">
            @csrf
            <div class="position">
                <img src="{{ asset('assets/img/search (1).svg') }}" alt="">
                <input type="text" name="query" placeholder="Поиск в TezInfo">
            </div>
        </form>
    </div>
</section>
<!-- Search section end -->
