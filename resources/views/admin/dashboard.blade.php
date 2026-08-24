@extends('admin.layout')

@section('title', 'Tableau de bord')
@section('heading', 'Tableau de bord')

@section('content')
<div class="grid gap-6 sm:grid-cols-2">
  <a href="{{ route('admin.jobs.index') }}" class="rounded-2xl border border-emerald-400/20 bg-emerald-500/5 p-6 transition hover:border-emerald-400/40 hover:bg-emerald-500/10">
    <p class="text-sm uppercase tracking-widest text-emerald-300/80">Métiers légaux</p>
    <p class="mt-3 text-4xl font-semibold text-white">{{ $jobsCount }}</p>
    <p class="mt-2 text-sm text-slate-400">Gérer les fiches métiers</p>
  </a>
  <a href="{{ route('admin.organizations.index') }}" class="rounded-2xl border border-rose-400/20 bg-rose-500/5 p-6 transition hover:border-rose-400/40 hover:bg-rose-500/10">
    <p class="text-sm uppercase tracking-widest text-rose-300/80">Organisations</p>
    <p class="mt-3 text-4xl font-semibold text-white">{{ $orgsCount }}</p>
    <p class="mt-2 text-sm text-slate-400">Gérer les organisations criminelles</p>
  </a>
</div>
@endsection
