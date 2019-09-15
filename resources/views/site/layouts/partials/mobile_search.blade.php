<!--                            #### Mobile Search -->
<form class="header_top_right_search_btn" action="{{ route('site.catalog.search') }}" method="post">
    @csrf
    <div class="uk-inline">
        <span class="uk-form-icon" uk-icon="icon: search"></span>
        <input id="search-input" class="header_top_right_search_btn_bar uk-input" name="query" type="search">
    </div>
</form>
<!--                            #### Mobile Search - END -->
