<div id="slides" class="carousel slide" data-ride="carousel">
    {{--  <!-- indicators -->  --}}
    <ul class="carousel-indicators">
        @php
            $i = 0;
        @endphp
        @foreach ($slide as $sl)
            <li data-target="#slides" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active':'' }}"></li>
            @php
                $i++;
            @endphp
        @endforeach
    </ul>
    {{--  <!-- indicators -->  --}}
    {{--  <!-- The slideshow -->  --}}
    <div class="carousel-inner">
        @php
            $i = 0;
        @endphp
        @foreach ($slide as $sl)
            @if ($sl->content_id)
            <div class="carousel-item {{ $i == 0 ? 'active':'' }}">
                <img src="shared_asset/upload/images/slide/{{ $sl->image }}" alt="{{ $sl->title }}" class="d-block">
                <div class="carousel-caption">
                    <a href="#" class="btn btn-outline-light btn-lg">
                       {{ $sl->title }}
                    </a>
                </div>
            </div>
            @else
                <div class="carousel-item {{ $i == 0 ? 'active':'' }}">
                    <img src="shared_asset/upload/images/slide/{{ $sl->image }}" alt="{{ $sl->title }}" class="d-block">
                </div>
            @endif
            @php
                $i++;
            @endphp
        @endforeach
    </div>
    {{--  <!-- The slideshow -->  --}}

    {{--  <!-- Left and right controls -->  --}}
    <a class="carousel-control-prev" href="#slides" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#slides" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>