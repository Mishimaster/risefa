<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CrimeCategory;
use App\Models\CrimeOrganization;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CrimeOrganizationController extends Controller
{
    public function index(): View
    {
        $categories = CrimeCategory::query()
            ->with('organizations')
            ->orderBy('sort_order')
            ->get();

        return view('admin.organizations.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.organizations.form', [
            'organization' => new CrimeOrganization(),
            'categories' => CrimeCategory::query()->orderBy('sort_order')->get(),
            'isEdit' => false,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['image'] = $this->storeImage($request) ?? null;

        CrimeOrganization::query()->create($data);

        return redirect()->route('admin.organizations.index')->with('success', 'Organisation créée.');
    }

    public function edit(CrimeOrganization $organization): View
    {
        return view('admin.organizations.form', [
            'organization' => $organization,
            'categories' => CrimeCategory::query()->orderBy('sort_order')->get(),
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, CrimeOrganization $organization): RedirectResponse
    {
        $data = $this->validated($request);
        $uploaded = $this->storeImage($request);

        if ($uploaded !== null) {
            $this->deleteStoredImage($organization->image);
            $data['image'] = $uploaded;
        }

        if ($request->boolean('remove_image')) {
            $this->deleteStoredImage($organization->image);
            $data['image'] = null;
        }

        $organization->update($data);

        return redirect()->route('admin.organizations.index')->with('success', 'Organisation mise à jour.');
    }

    public function destroy(CrimeOrganization $organization): RedirectResponse
    {
        $this->deleteStoredImage($organization->image);
        $organization->delete();

        return redirect()->route('admin.organizations.index')->with('success', 'Organisation supprimée.');
    }

    /**
     * @return array{crime_category_id: int, name: string, description: string, discord_url: ?string, sort_order: int}
     */
    private function validated(Request $request): array
    {
        $validated = $request->validate([
            'crime_category_id' => ['required', 'exists:crime_categories,id'],
            'name' => ['required', 'string', 'max:120'],
            'description' => ['required', 'string', 'max:2000'],
            'discord_url' => ['nullable', 'url', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'max:4096'],
        ]);

        return [
            'crime_category_id' => (int) $validated['crime_category_id'],
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

        $directory = public_path('uploads/organizations');

        $filename = Str::random(40).'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->move($directory, $filename);

        return 'uploads/organizations/'.$filename;
    }

    private function deleteStoredImage(?string $path): void
    {
        if (! $path || str_starts_with($path, 'images/')) {
            return;
        }

        $relative = str_starts_with($path, 'organizations/') ? 'uploads/'.$path : $path;
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
