@if($cr == 'place.create')
    <div class="mitem active"><span>Создать место</span></div>
@else
    <div class="mitem" onclick="document.location.href='{{ route('place.create') }}'; return false;"><span><a
                    href="{{ route('place.create') }}" class="latent">Создать место</a></span></div>
@endif
@if($cr == 'photo.get_linked_form' || $cr == 'photo.get_wildcard_form')
    <div class="mitem active"><span>Добавить фотографию к месту</span></div>
@elseif($cr == 'place.index' || $cr == 'place.create' || $cr == 'rating.show')
    <div class="mitem" onclick="document.location.href='{{ route('photo.get_wildcard_form') }}'; return false;"><span><a
                    href="{{ route('photo.get_wildcard_form') }}" class="latent">Добавить фотографию к месту</a></span></div>
@else
    <div class="mitem" onclick="document.location.href='{{ route('photo.get_linked_form', [$place]) }}'; return false;"><span><a
                    href="{{ route('photo.get_linked_form', [$place]) }}" class="latent">Добавить фотографию к месту</a></span></div>
@endif
@if($cr == 'rating.show')
    <div class="mitem active"><span>Просмотр рейтингов</span></div>
@else
    <div class="mitem" onclick="document.location.href='{{ route('rating.show') }}'; return false;"><span><a
                    href="{{ route('rating.show') }}" class="latent">Просмотр рейтингов</a></span></div>
@endif
@if($cr == 'place.index')
    <div class="mitem active"><span>Все места</span></div>
@else
    <div class="mitem" onclick="document.location.href='{{ route('place.index') }}'; return false;"><span><a
                    href="{{ route('place.index') }}" class="latent">Все места</a></span></div>
@endif
