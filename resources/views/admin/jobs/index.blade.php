@extends('admin.layout')

@section('title', 'Métiers légaux')
@section('heading', 'Métiers légaux')

@section('content')
<div class="mb-6 flex flex-wrap items-center justify-between gap-3">
  <p class="text-sm text-slate-400">Ajouter, modifier ou supprimer les métiers affichés sur le site.</p>
  <a href="{{ route('admin.jobs.create') }}" class="rounded-xl border border-emerald-400/40 bg-emerald-500/20 px-4 py-2 text-sm font-semibold text-emerald-50 hover:bg-emerald-500/30">Ajouter un métier</a>
</div>

<div class="overflow-x-auto rounded-2xl border border-white/10">
  <table class="min-w-full text-left text-sm">
    <thead class="border-b border-white/10 bg-white/5 text-slate-400">
      <tr>
        <th class="px-4 py-3 font-medium">Image</th>
        <th class="px-4 py-3 font-medium">Nom</th>
        <th class="px-4 py-3 font-medium">Ordre</th>
        <th class="px-4 py-3 font-medium">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($jobs as $job)
        <tr class="border-b border-white/5 hover:bg-white/[0.03]">
          <td class="px-4 py-3">
            <img src="{{ $job->imageUrl() }}" alt="" class="h-12 w-12 rounded-lg object-contain bg-black/40" />
          </td>
          <td class="px-4 py-3">
            <p class="font-medium text-white">{{ $job->name }}</p>
            <p class="mt-1 max-w-md truncate text-slate-400">{{ $job->description }}</p>
          </td>
          <td class="px-4 py-3 text-slate-300">{{ $job->sort_order }}</td>
          <td class="px-4 py-3">
            <div class="flex flex-wrap gap-2">
              <a href="{{ route('admin.jobs.edit', $job) }}" class="rounded-lg border border-white/15 px-3 py-1.5 text-xs text-slate-200 hover:bg-white/10">Modifier</a>
              <form method="POST" action="{{ route('admin.jobs.destroy', $job) }}" onsubmit="return confirm('Supprimer ce métier ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="rounded-lg border border-rose-400/30 px-3 py-1.5 text-xs text-rose-200 hover:bg-rose-500/15">Supprimer</button>
              </form>
            </div>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="4" class="px-4 py-8 text-center text-slate-400">Aucun métier pour le moment.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
