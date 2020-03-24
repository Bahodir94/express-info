@if ($message = session()->get('success'))
    <div class="uk-alert-success" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p>{{ $message }}</p>
    </div>
@endif
