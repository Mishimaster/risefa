<?php

namespace App\Http\Controllers;

use App\Models\CrimeCategory;
use App\Models\LegalJob;

class PageController extends RisePageController
{
    public function home(): \Illuminate\View\View
    {
        return $this->risePage('home', 'pages.home');
    }

    public function metiersLegaux(): \Illuminate\View\View
    {
        $jobs = LegalJob::query()->orderBy('sort_order')->orderBy('name')->get();

        return $this->risePage('metiers-legaux', 'pages.metiers-legaux', [
            'jobs' => $jobs,
        ]);
    }

    public function organisationsCriminelles(): \Illuminate\View\View
    {
        $categories = CrimeCategory::query()
            ->with('organizations')
            ->orderBy('sort_order')
            ->get();

        return $this->risePage('organisations-criminelles', 'pages.organisations-criminelles', [
            'categories' => $categories,
        ]);
    }
}
