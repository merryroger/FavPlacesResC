@extends('appender')

@section('title', __('myplaces.forms.newphotoloading'))

@section('hdr')
    @include('formheader', ['text' => __('myplaces.forms.newphoto'), 'cr' => Route::currentRouteName()])
@endsection

@section('form')
    <form action="{{ route('photo.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" class="ff" tabindex="1" required autofocus/><br/>
        <select name="place_id" size="1" class="ff" tabindex="2">
            @foreach($places as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <div class="fmctrls">
            <button type="button" class="cancel" tabindex="3"
                    onclick="document.location.href='{{ route('place.index') }}'; return false;">@lang('myplaces.forms.cancel')
            </button>
            <button type="submit" class="do" tabindex="4">@lang('myplaces.forms.upload')</button>
        </div>
    </form>
@endsection
