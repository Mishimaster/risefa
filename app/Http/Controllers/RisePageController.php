<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

abstract class RisePageController extends Controller
{
    protected function risePage(string $pageKey, string $view, array $data = []): View
    {
        return view($view, array_merge([
            'page' => $pageKey,
            'theme' => config("rise.pages.{$pageKey}"),
        ], $data));
    }
}
