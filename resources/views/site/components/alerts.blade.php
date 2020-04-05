@if ($message = session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Готово!</h4>
        <p>{{ $message }}</p>
        <button class="close" type="button" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
