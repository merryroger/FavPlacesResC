@extends('appender')

@section('title', __('myplaces.forms.newphotoloading'))

@section('hdr')
    @include('formheader', ['text' => __('myplaces.forms.newphoto'), 'cr' => Route::currentRouteName(), 'place' => $place])
@endsection

@section('form')
    <form action="{{ route('photo.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if(!$errors->any())
            <input type="hidden" id="referer" name="referer" value="{{ $referer }}">
        @else
            <input type="hidden" id="referer" name="referer" value="{{ old('referer') }}">
        @endif
        <input type="file" name="image" class="ff" tabindex="1" required autofocus/><br/>
        <input type="hidden" name="place_id" value="{{ $place->id }}">
        <div class="fmctrls">
            <button type="button" class="cancel" tabindex="3"
                    onclick="document.location.href=document.querySelector('#referer').value; return false;">@lang('myplaces.forms.cancel')
            </button>
            <button type="submit" class="do" tabindex="4">@lang('myplaces.forms.upload')</button>
        </div>
    </form>
@endsection
