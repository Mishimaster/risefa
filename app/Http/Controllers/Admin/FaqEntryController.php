<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqEntry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqEntryController extends Controller
{
    public function index(): View
    {
        $entries = FaqEntry::query()->orderBy('sort_order')->orderBy('question')->get();

        return view('admin.faq.index', compact('entries'));
    }

    public function create(): View
    {
        return view('admin.faq.form', [
            'entry' => new FaqEntry(['is_active' => true, 'category' => 'general', 'sort_order' => 0]),
            'isEdit' => false,
            'categories' => FaqEntry::categories(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        FaqEntry::query()->create($this->validated($request));

        return redirect()->route('admin.faq.index')->with('success', 'Question FAQ créée.');
    }

    public function edit(FaqEntry $faq): View
    {
        return view('admin.faq.form', [
            'entry' => $faq,
            'isEdit' => true,
            'categories' => FaqEntry::categories(),
        ]);
    }

    public function update(Request $request, FaqEntry $faq): RedirectResponse
    {
        $faq->update($this->validated($request));

        return redirect()->route('admin.faq.index')->with('success', 'Question FAQ mise à jour.');
    }

    public function destroy(FaqEntry $faq): RedirectResponse
    {
        $faq->delete();

        return redirect()->route('admin.faq.index')->with('success', 'Question FAQ supprimée.');
    }

    /**
     * @return array{question: string, answer: string, category: string, sort_order: int, is_active: bool}
     */
    private function validated(Request $request): array
    {
        $validated = $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string', 'max:5000'],
            'category' => ['required', 'in:general,technique,gameplay'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['sometimes', 'boolean'],
        ]);

        return [
            'question' => $validated['question'],
            'answer' => $validated['answer'],
            'category' => $validated['category'],
            'sort_order' => (int) ($validated['sort_order'] ?? 0),
            'is_active' => $request->boolean('is_active'),
        ];
    }
}
