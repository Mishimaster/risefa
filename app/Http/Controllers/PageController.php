<?php

namespace App\Http\Controllers;

class PageController extends RisePageController
{
    public function home(): \Illuminate\View\View
    {
        return $this->risePage('home', 'pages.home');
    }

    public function faq(): \Illuminate\View\View
    {
        return $this->risePage('faq', 'pages.faq');
    }

    public function metiersLegaux(): \Illuminate\View\View
    {
        return $this->risePage('metiers-legaux', 'pages.metiers-legaux');
    }

    public function organisationsCriminelles(): \Illuminate\View\View
    {
        return $this->risePage('organisations-criminelles', 'pages.organisations-criminelles');
    }
}
