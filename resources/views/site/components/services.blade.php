@if (isset($services))
    <hr class="new">
    <div class="slider uk-container uk-container-center">
        <ul class="slider_wrapper">
            @foreach($services as $service)
                <li class="slide">
                    <a href="#">
                        <div class="card">
                            <div class="card_img">
                                <img src="{{ $service->getImage() }}" alt="{{ $service->ru_title }}">
                            </div>
                            <h2>{{ $service->ru_title }}</h2>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endif
