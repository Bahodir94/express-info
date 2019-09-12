<!-- Search section -->


<form action="{{ route('site.catalog.search') }}" method="post" class="uk-grid-collapse" uk-grid>
    <div class="">
        <div class="uk-inline">
            @csrf
            <a class="uk-form-icon" href="#" uk-icon="icon: search"></a>
            <input class="uk-input" type="text" name="query">

        </div>
    </div>
     <div class="uk-visible@m" >
        <button class="uk-button uk-button-primary ">Искать</button>
    </div>
    <div class="uk-width-1-1 uk-hidden@m" >
        <button class="uk-button uk-button-primary uk-width-1-1@m">Искать</button>
    </div>

</form>

<!-- Search section end -->
