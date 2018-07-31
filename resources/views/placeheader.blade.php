<header>
    <div class="title">
        {{ $placename }}
        @if(!$empty)
            <div class="cityvote">
                <div class="pl plike" title="@lang('myplaces.places.likeplace')"
                     onclick="markPlace('{{ route('place.like', [$placeid, 1]) }}')">{{ $place->getLikes() }}</div>
                <div class="pl pdislike"
                     title="@lang('myplaces.places.dislikeplace')"
                     onclick="markPlace('{{ route('place.like', [$placeid, 0]) }}')">{{ $place->getDisLikes() }}</div>
                <div class="pl prating" title="@lang('myplaces.places.placerating')">{{ $place->calcRating() }}</div>
            </div>
        @endif
    </div>
    <nav>
        @include('menu', ['place' => $placeid, 'cr' => Route::currentRouteName()])
    </nav>
    <br clear="all"/>
</header>
