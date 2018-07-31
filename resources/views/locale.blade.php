<div class="lcp">
    @foreach(Config::get('app.locales') as $locale)
        @if($locale == App::getLocale())
            <div class="acl loc">{{ ucfirst($locale) }}</div>
        @else
            <div class="icl loc" onclick="return changeLocale('{{ route("change.locale", $locale) }}');"><a
                        href="{{ route('change.locale', $locale) }}">{{ ucfirst($locale) }}</a></div>
        @endif
    @endforeach
</div>