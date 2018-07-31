@extends('appender')

@section('title', __('myplaces.forms.newplacecreation'))

@section('hdr')
    @include('formheader', ['text' => __('myplaces.forms.mynewplace'), 'cr' => Route::currentRouteName()])
@endsection

@section('form')
    <form action="{{ route('place.store') }}" method="post">
        @csrf
        <input type="text" name="name" class="ff" value="" placeholder="@lang('myplaces.forms.placename')" tabindex="1" required
               autofocus/><br/>
        <select name="placetype_id" size="1" class="ff" tabindex="2">
            @foreach($types->all() as $item)
                <option value="{{ $item->id }}">{{ __("myplaces.types.{$item->name}")  }}</option>
            @endforeach
        </select>
        <div class="fmctrls">
            <button type="button" class="cancel" tabindex="3"
                    onclick="document.location.href='{{ route('place.index') }}'; return false;">@lang('myplaces.forms.cancel')
            </button>
            <button type="submit" class="do" tabindex="4">@lang('myplaces.forms.create')</button>
        </div>
    </form>
@endsection
