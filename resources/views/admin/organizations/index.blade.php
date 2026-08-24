@extends('admin.layout')

@section('title', 'Organisations')
@section('heading', 'Organisations criminelles')

@section('content')
<div class="mb-6 flex flex-wrap items-center justify-between gap-3">
  <p class="text-sm text-slate-400">Les sections (Gang, Mafia…) sont fixes. Vous gérez les organisations à l'intérieur.</p>
  <a href="{{ route('admin.organizations.create') }}" class="rounded-xl border border-rose-400/40 bg-rose-500/20 px-4 py-2 text-sm font-semibold text-rose-50 hover:bg-rose-500/30">Ajouter une organisation</a>
</div>

@foreach ($categories as $category)
  <section class="mb-8 overflow-hidden rounded-2xl border border-white/10">
    <div class="border-b border-white/10 bg-rose-500/10 px-4 py-3">
      <h2 class="font-semibold text-rose-100">{{ $category->name }}</h2>
      <p class="text-xs text-slate-400">Section non modifiable</p>
    </div>
    <div class="overflow-x-auto">
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
          @forelse ($category->organizations as $organization)
            <tr class="border-b border-white/5 hover:bg-white/[0.03]">
              <td class="px-4 py-3">
                <img src="{{ $organization->imageUrl() }}" alt="" class="h-12 w-12 rounded-lg object-contain bg-black/40" />
              </td>
              <td class="px-4 py-3">
                <p class="font-medium text-white">{{ $organization->name }}</p>
                <p class="mt-1 max-w-md truncate text-slate-400">{{ $organization->description }}</p>
              </td>
              <td class="px-4 py-3 text-slate-300">{{ $organization->sort_order }}</td>
              <td class="px-4 py-3">
                <div class="flex flex-wrap gap-2">
                  <a href="{{ route('admin.organizations.edit', $organization) }}" class="rounded-lg border border-white/15 px-3 py-1.5 text-xs text-slate-200 hover:bg-white/10">Modifier</a>
                  <form method="POST" action="{{ route('admin.organizations.destroy', $organization) }}" onsubmit="return confirm('Supprimer cette organisation ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded-lg border border-rose-400/30 px-3 py-1.5 text-xs text-rose-200 hover:bg-rose-500/15">Supprimer</button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="px-4 py-6 text-center text-slate-400">Aucune organisation dans cette section.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </section>
@endforeach
@endsection
