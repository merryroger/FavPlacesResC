@if($cr == 'place.create')
    <div class="mitem active"><span>@lang('myplaces.menu.placecreate')</span></div>
@else
    <div class="mitem" onclick="document.location.href='{{ route('place.create') }}'; return false;"><span><a
                    href="{{ route('place.create') }}" class="latent">@lang('myplaces.menu.placecreate')</a></span></div>
@endif
@if($cr == 'photo.get_linked_form' || $cr == 'photo.get_wildcard_form')
    <div class="mitem active"><span>@lang('myplaces.menu.addphotoatplace')</span></div>
@elseif($cr == 'place.index' || $cr == 'place.create' || $cr == 'rating.show')
    <div class="mitem" onclick="document.location.href='{{ route('photo.get_wildcard_form') }}'; return false;"><span><a
                    href="{{ route('photo.get_wildcard_form') }}" class="latent">@lang('myplaces.menu.addphotoatplace')</a></span></div>
@else
    <div class="mitem" onclick="document.location.href='{{ route('photo.get_linked_form', [$place]) }}'; return false;"><span><a
                    href="{{ route('photo.get_linked_form', [$place]) }}" class="latent">@lang('myplaces.menu.addphotoatplace')</a></span></div>
@endif
@if($cr == 'rating.show')
    <div class="mitem active"><span>@lang('myplaces.menu.ratingreview')</span></div>
@else
    <div class="mitem" onclick="document.location.href='{{ route('rating.show') }}'; return false;"><span><a
                    href="{{ route('rating.show') }}" class="latent">@lang('myplaces.menu.ratingreview')</a></span></div>
@endif
@if($cr == 'place.index')
    <div class="mitem active"><span>@lang('myplaces.menu.allplaces')</span></div>
@else
    <div class="mitem" onclick="document.location.href='{{ route('place.index') }}'; return false;"><span><a
                    href="{{ route('place.index') }}" class="latent">@lang('myplaces.menu.allplaces')</a></span></div>
@endif
