<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        {{ auth()->user() ? auth()->user()->locale() : trans()->getLocale() }}
    </a>

    <ul class="dropdown-menu" role="menu">
        @foreach(config('app.locales') as $locale)
            <li>
                <a href="{{ route('locales') }}"
                   onclick="event.preventDefault();
                           document.getElementById('form-locale-{{ $locale }}').submit();">
                    {{ $locale }}
                </a>

                <form id="form-locale-{{ $locale }}" action="{{ route('locales') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="locale" value="{{ $locale }}">
                </form>
            </li>
        @endforeach
    </ul>
</li>