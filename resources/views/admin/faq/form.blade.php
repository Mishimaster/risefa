@extends('admin.layout')

@section('title', $isEdit ? 'Modifier FAQ' : 'Nouvelle FAQ')
@section('heading', $isEdit ? 'Modifier la question' : 'Nouvelle question')

@section('content')
<form method="POST" action="{{ $isEdit ? route('admin.faq.update', $entry) : route('admin.faq.store') }}" class="mx-auto max-w-2xl space-y-5 rounded-2xl border border-white/10 bg-black/40 p-6">
  @csrf
  @if ($isEdit)
    @method('PUT')
  @endif

  <div>
    <label class="block text-sm text-slate-300" for="question">Question</label>
    <input id="question" name="question" value="{{ old('question', $entry->question) }}" required class="mt-1 w-full rounded-xl border border-white/15 bg-black/40 px-4 py-2.5 outline-none focus:border-purple-400/50" />
    <p class="mt-1 text-xs text-slate-500">C’est cette formulation qui sert au matching du chatbot.</p>
  </div>

  <div>
    <label class="block text-sm text-slate-300" for="answer">Réponse</label>
    <textarea id="answer" name="answer" rows="5" required class="mt-1 w-full rounded-xl border border-white/15 bg-black/40 px-4 py-2.5 outline-none focus:border-purple-400/50">{{ old('answer', $entry->answer) }}</textarea>
  </div>

  <div>
    <label class="block text-sm text-slate-300" for="category">Catégorie</label>
    <select id="category" name="category" required class="mt-1 w-full rounded-xl border border-white/15 bg-black/40 px-4 py-2.5 outline-none focus:border-purple-400/50">
      @foreach ($categories as $value => $label)
        <option value="{{ $value }}" @selected(old('category', $entry->category) === $value)>{{ $label }}</option>
      @endforeach
    </select>
  </div>

  <div>
    <label class="block text-sm text-slate-300" for="sort_order">Ordre</label>
    <input id="sort_order" type="number" min="0" name="sort_order" value="{{ old('sort_order', $entry->sort_order ?? 0) }}" class="mt-1 w-full rounded-xl border border-white/15 bg-black/40 px-4 py-2.5 outline-none focus:border-purple-400/50" />
  </div>

  <label class="flex items-center gap-2 text-sm text-slate-300">
    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $entry->is_active)) class="rounded border-white/20 bg-black/40" />
    Active (visible par le chatbot)
  </label>

  <div class="flex gap-3 pt-2">
    <button type="submit" class="rounded-xl border border-purple-400/40 bg-purple-500/20 px-5 py-2.5 font-semibold text-purple-50 hover:bg-purple-500/30">
      {{ $isEdit ? 'Enregistrer' : 'Créer' }}
    </button>
    <a href="{{ route('admin.faq.index') }}" class="rounded-xl border border-white/15 px-5 py-2.5 text-slate-300 hover:bg-white/5">Annuler</a>
  </div>
</form>
@endsection
