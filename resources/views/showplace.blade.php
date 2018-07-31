@extends('favlist')

@section('listhdr')
    @include('placeheader', ['placeid' => $place->id, 'placename' => $place->name, 'empty' => false])
    <form id="rmphoto" action="" method="POST">
        @csrf
        @method('DELETE')
    </form>
    <div class="listpad">
        @foreach($listset as $item)
            <div class="photoframe"
                 style="background: #ffffff url('{{ Storage::url($item->location) }}') no-repeat top left; background-size: 100% auto; height: {{ round(800*$item->height/$item->width) }}px;">
                <div class="photodata">{{ $item->created_at->format('d.m.Y H:i:s') }}</div>
                <div class="photoctrl ph_delete" title="@lang('myplaces.places.delete')"
                     onclick="confirmDeletePhoto('{{ route('photo.destroy', [$item->id]) }}', '{{ __('myplaces.places.delete') }}?');"></div>
                <br clear="all"/>
                <div class="photodata ph_{{ $item->id }}">
                    <div class="ll like" title="@lang('myplaces.places.like')"
                         onclick="markPhoto('{{ route('photo.like', [$item->id, 1]) }}')">{{ $item->getLikes() }}</div>
                    <div class="ll dislike"
                         title="@lang('myplaces.places.dislike')"
                         onclick="markPhoto('{{ route('photo.like', [$item->id, 0]) }}')">{{ $item->getDisLikes() }}</div>
                    <div class="ll ph_rating" title="@lang('myplaces.ratings.rating')">{{ $item->calcRating() }}</div>
                </div>
                <div class="photoctrl ph_download" title="@lang('myplaces.places.download')"
                     onclick="downloadPhoto('{{ route('photo.show', [$item->id]) }}')"></div>
            </div>
        @endforeach
    </div>
@endsection

@section('emptyhdr')
    <div class="listpad">@lang('myplaces.places.nophoto')</div>
    @include('placeheader', ['placeid' => $place->id, 'placename' => $place->name, 'empty' => true])
@endsection