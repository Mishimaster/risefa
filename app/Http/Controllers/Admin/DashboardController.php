<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CrimeOrganization;
use App\Models\FaqEntry;
use App\Models\LegalJob;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'jobsCount' => LegalJob::query()->count(),
            'orgsCount' => CrimeOrganization::query()->count(),
            'faqCount' => FaqEntry::query()->count(),
        ]);
    }
}
