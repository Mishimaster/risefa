@extends('admin.layout')

@section('title', 'FAQ / Chatbot')
@section('heading', 'FAQ / Chatbot')

@section('content')
<div class="mb-6 flex flex-wrap items-center justify-between gap-3">
  <p class="text-sm text-slate-400">Ces questions alimentent le chatbot (bulle en bas à droite du site).</p>
  <a href="{{ route('admin.faq.create') }}" class="rounded-xl border border-purple-400/40 bg-purple-500/20 px-4 py-2 text-sm font-semibold text-purple-50 hover:bg-purple-500/30">Ajouter une question</a>
</div>

<div class="overflow-x-auto rounded-2xl border border-white/10">
  <table class="min-w-full text-left text-sm">
    <thead class="border-b border-white/10 bg-white/5 text-slate-400">
      <tr>
        <th class="px-4 py-3 font-medium">Question</th>
        <th class="px-4 py-3 font-medium">Catégorie</th>
        <th class="px-4 py-3 font-medium">Ordre</th>
        <th class="px-4 py-3 font-medium">Actif</th>
        <th class="px-4 py-3 font-medium">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($entries as $entry)
        <tr class="border-b border-white/5 hover:bg-white/[0.03]">
          <td class="px-4 py-3">
            <p class="font-medium text-white">{{ $entry->question }}</p>
            <p class="mt-1 max-w-xl truncate text-slate-400">{{ $entry->answer }}</p>
          </td>
          <td class="px-4 py-3 text-slate-300">{{ \App\Models\FaqEntry::categories()[$entry->category] ?? $entry->category }}</td>
          <td class="px-4 py-3 text-slate-300">{{ $entry->sort_order }}</td>
          <td class="px-4 py-3">
            @if ($entry->is_active)
              <span class="rounded-full bg-emerald-500/15 px-2 py-0.5 text-xs text-emerald-200">Oui</span>
            @else
              <span class="rounded-full bg-slate-500/20 px-2 py-0.5 text-xs text-slate-300">Non</span>
            @endif
          </td>
          <td class="px-4 py-3">
            <div class="flex flex-wrap gap-2">
              <a href="{{ route('admin.faq.edit', $entry) }}" class="rounded-lg border border-white/15 px-3 py-1.5 text-xs text-slate-200 hover:bg-white/10">Modifier</a>
              <form method="POST" action="{{ route('admin.faq.destroy', $entry) }}" onsubmit="return confirm('Supprimer cette question ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="rounded-lg border border-rose-400/30 px-3 py-1.5 text-xs text-rose-200 hover:bg-rose-500/15">Supprimer</button>
              </form>
            </div>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="5" class="px-4 py-8 text-center text-slate-400">Aucune question FAQ pour le moment.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
