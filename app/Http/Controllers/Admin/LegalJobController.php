<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LegalJob;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;

class LegalJobController extends Controller
{
    public function index(): View
    {
        $jobs = LegalJob::query()->orderBy('sort_order')->orderBy('name')->get();

        return view('admin.jobs.index', compact('jobs'));
    }

    public function create(): View
    {
        return view('admin.jobs.form', [
            'job' => new LegalJob(),
            'isEdit' => false,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['image'] = $this->storeImage($request) ?? null;

        LegalJob::query()->create($data);

        return redirect()->route('admin.jobs.index')->with('success', 'Métier créé.');
    }

    public function edit(LegalJob $job): View
    {
        return view('admin.jobs.form', [
            'job' => $job,
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, LegalJob $job): RedirectResponse
    {
        $data = $this->validated($request);
        $uploaded = $this->storeImage($request);

        if ($uploaded !== null) {
            $this->deleteStoredImage($job->image);
            $data['image'] = $uploaded;
        }

        if ($request->boolean('remove_image')) {
            $this->deleteStoredImage($job->image);
            $data['image'] = null;
        }

        $job->update($data);

        return redirect()->route('admin.jobs.index')->with('success', 'Métier mis à jour.');
    }

    public function destroy(LegalJob $job): RedirectResponse
    {
        $this->deleteStoredImage($job->image);
        $job->delete();

        return redirect()->route('admin.jobs.index')->with('success', 'Métier supprimé.');
    }

    /**
     * @return array{name: string, description: string, discord_url: ?string, sort_order: int}
     */
    private function validated(Request $request): array
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'description' => ['required', 'string', 'max:2000'],
            'discord_url' => ['nullable', 'url', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'max:4096'],
        ]);

        return [
            'name' => $validated['name'],
            'description' => $validated['description'],
            'discord_url' => $validated['discord_url'] ?? null,
            'sort_order' => (int) ($validated['sort_order'] ?? 0),
        ];
    }

    private function storeImage(Request $request): ?string
    {
        if (! $request->hasFile('image')) {
            return null;
        }

        $directory = public_path('uploads/jobs');
        File::ensureDirectoryExists($directory);

        $filename = Str::random(40).'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->move($directory, $filename);

        return 'uploads/jobs/'.$filename;
    }

    private function deleteStoredImage(?string $path): void
    {
        if (! $path || str_starts_with($path, 'images/')) {
            return;
        }

        // Compat anciens uploads storage (jobs/xxx.png)
        $relative = str_starts_with($path, 'jobs/') ? 'uploads/'.$path : $path;
        $fullPath = public_path($relative);

        if (is_file($fullPath)) {
            File::delete($fullPath);
        }

        $legacy = public_path('storage/'.ltrim(str_replace('uploads/', '', $relative), '/'));
        if (is_file($legacy)) {
            File::delete($legacy);
        }
    }
}
