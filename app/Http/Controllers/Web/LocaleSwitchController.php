<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocaleSwitchController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'locale' => ['required', 'string', 'in:fr,ar'],
        ]);

        session(['frontoffice_locale' => $request->input('locale')]);
        app()->setLocale($request->input('locale'));

        return redirect()->back();
    }
}
