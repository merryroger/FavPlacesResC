@extends('favlist')

@section('listhdr')
    @include('placeheader', ['placeid' => 0, 'placename' => __('myplaces.places.myfavplaces'), 'empty' => true])
    <div class="listpad">
        @foreach($listset as $place)
            <div class="fpholder">
                <div class="pldata"
                     onclick="document.location.href='{{ route('place.show', [urlencode($place->id)]) }}'; return false;">
                    <div class="pl_rating" title="@lang('myplaces.ratings.rating')">{{ $place->calcRating() }}</div>
                    <div class="placename">{{ $place->name }}</div>
                    <div class="placetype">{{ __("myplaces.types.{$types[$place->placetype_id]}") }}</div>
                </div>
                <div class="pladdphoto" title="@lang('myplaces.places.addphoto')"
                     onclick="document.location.href='{{ route('photo.get_linked_form', [urlencode($place->id)]) }}'; return false;">
                    <div class="pictcount" title="@lang('myplaces.places.loadedphotos')">{{ $place->pictures->count() }}</div>
                </div>
                <br clear="all"/>
            </div>
        @endforeach
    </div>
@endsection

@section('emptyhdr')
    <div class="listpad">@lang('myplaces.places.noplaces')</div>
    @include('placeheader', ['placeid' => 0, 'placename' => __('myplaces.places.myfavplaces'), 'empty' => true])
@endsection