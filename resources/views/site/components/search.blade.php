<!-- Search section -->


<form action="{{ route('site.catalog.search') }}" method="post" class="uk-grid-small" uk-grid>
    <div class="">
        <div class="uk-inline">
            @csrf
            <a class="uk-form-icon" href="#" uk-icon="icon: search"></a>
            <input class="uk-input" type="text" name="query">

        </div>
    </div>
    <button class="uk-button uk-button-primary">Искать</button>
</form>
<!--


<section class="uk-section-xsmall">
    <div class="uk-container uk-container-expand uk-container-center">
        <form action=""  class="uk-center">
            
            <div class="position">
                <img src="{{ asset('assets/img/search (1).svg') }}" alt="">
                <input type="text" name="query" placeholder="Поиск в TezInfo">
            </div>
        </form>
    </div>
</section>
-->
<!-- Search section end -->
