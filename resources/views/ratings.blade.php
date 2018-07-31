@extends('favlist')

@section('listhdr')
    @include('placeheader', ['placeid' => 0, 'placename' => __('myplaces.ratings.ratings'), 'empty' => true])
    <div class="rt_pad">
        <div class="rtc">
            <table class="rating">
                <caption>@lang('myplaces.ratings.places')</caption>
                <tr>
                    <th class="th_rating"></th>
                    <th class="th_rateditem">@lang('myplaces.ratings.place')</th>
                </tr>
                @foreach($rates as $lid => $rate)
                    <tr class="rt_item_row" onclick="document.location.href = '{{ route('place.show', $listset[$lid]->id) }}'">
                        <td class="td_rating">{{ $rate }}</td>
                        <td><span>{{ $listset[$lid]->name }}</span></td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="rtc">
            <table class="rating">
                <caption>@lang('myplaces.ratings.photos')</caption>
                <tr>
                    <th class="th_rating"></th>
                    <th class="th_rateditem">@lang('myplaces.ratings.photo')</th>
                </tr>
                @foreach($ph_rates as $lid => $rate)
                    <tr>
                        <td class="td_rating">{{ $rate }}</td>
                        <td>#{{ $photoset[$lid]->id }} @ {{ $photoset[$lid]->place->name }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
