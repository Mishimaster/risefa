@extends('admin.layout')

@section('title', $isEdit ? 'Modifier métier' : 'Nouveau métier')
@section('heading', $isEdit ? 'Modifier le métier' : 'Nouveau métier')

@section('content')
<form method="POST" action="{{ $isEdit ? route('admin.jobs.update', $job) : route('admin.jobs.store') }}" enctype="multipart/form-data" class="mx-auto max-w-2xl space-y-5 rounded-2xl border border-white/10 bg-black/40 p-6">
  @csrf
  @if ($isEdit)
    @method('PUT')
  @endif

  <div>
    <label class="block text-sm text-slate-300" for="name">Nom</label>
    <input id="name" name="name" value="{{ old('name', $job->name) }}" required class="mt-1 w-full rounded-xl border border-white/15 bg-black/40 px-4 py-2.5 outline-none focus:border-emerald-400/50" />
  </div>

  <div>
    <label class="block text-sm text-slate-300" for="description">Description</label>
    <textarea id="description" name="description" rows="4" required class="mt-1 w-full rounded-xl border border-white/15 bg-black/40 px-4 py-2.5 outline-none focus:border-emerald-400/50">{{ old('description', $job->description) }}</textarea>
  </div>

  <div>
    <label class="block text-sm text-slate-300" for="discord_url">Lien Discord</label>
    <input id="discord_url" type="url" name="discord_url" value="{{ old('discord_url', $job->discord_url) }}" placeholder="https://discord.gg/..." class="mt-1 w-full rounded-xl border border-white/15 bg-black/40 px-4 py-2.5 outline-none focus:border-emerald-400/50" />
  </div>

  <div>
    <label class="block text-sm text-slate-300" for="sort_order">Ordre d'affichage</label>
    <input id="sort_order" type="number" min="0" name="sort_order" value="{{ old('sort_order', $job->sort_order ?? 0) }}" class="mt-1 w-full rounded-xl border border-white/15 bg-black/40 px-4 py-2.5 outline-none focus:border-emerald-400/50" />
  </div>

  <div>
    <label class="block text-sm text-slate-300" for="image">Image</label>
    @if ($isEdit)
      <img src="{{ $job->imageUrl() }}" alt="" class="mt-2 mb-3 h-20 w-20 rounded-lg object-contain bg-black/40" />
    @endif
    <input id="image" type="file" name="image" accept="image/*" class="mt-1 block w-full text-sm text-slate-300" />
    <p class="mt-1 text-xs text-slate-500">Sans image : logo Rise légal par défaut.</p>
    @if ($isEdit && $job->image)
      <label class="mt-3 flex items-center gap-2 text-sm text-slate-400">
        <input type="checkbox" name="remove_image" value="1" />
        Retirer l'image actuelle
      </label>
    @endif
  </div>

  <div class="flex gap-3 pt-2">
    <button type="submit" class="rounded-xl border border-emerald-400/40 bg-emerald-500/20 px-5 py-2.5 font-semibold text-emerald-50 hover:bg-emerald-500/30">
      {{ $isEdit ? 'Enregistrer' : 'Créer' }}
    </button>
    <a href="{{ route('admin.jobs.index') }}" class="rounded-xl border border-white/15 px-5 py-2.5 text-slate-300 hover:bg-white/5">Annuler</a>
  </div>
</form>
@endsection
