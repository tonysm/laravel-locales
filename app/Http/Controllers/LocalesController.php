<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LocalesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'locale' => [
                'required',
                Rule::in(config('app.locales')),
            ],
        ]);

        $locale = $request->get('locale');

        if ($request->user()) {
            $request->user()->update(['locale' => $locale]);
        } elseif (!$request->wantsJson()) {
            $request->session()->put('locale', $locale);
        }

        if ($request->wantsJson()) {
            return response()->json([], 200);
        }

        return back();
    }
}
