<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Lang;

class HandlesLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = $this->detectLocale($request);

        Lang::setLocale($locale);
        Carbon::setLocale($locale);

        return $next($request);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return string
     */
    private function detectLocale($request)
    {
        if ($user = $request->user()) {
            return $user->locale() ?: $this->detectHttpLanguage($request);
        }

        return $this->detectHttpLanguage($request);
    }

    /**
     * @param $request
     *
     * @return mixed
     */
    private function detectHttpLanguage($request)
    {
        $locales = config('app.locales');
        $locale = $request->header('Accept-Language', $defaultLocale = config('app.locale'));

        if (!in_array($locale, $locales)) {
            return $defaultLocale;
        }

        return $locale;
    }
}
