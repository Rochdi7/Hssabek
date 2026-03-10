<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;

class DocumentationController extends Controller
{
    public function index()
    {
        return view('backoffice.documentation.index');
    }
}
