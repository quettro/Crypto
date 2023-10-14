@extends('layouts.superuser')

@section('title', __('Дашборд'))
@section('description', __(''))

@section('content')
    @php
        $lastActivity = \App\Models\User::whereNot('id', Auth::user()->id)->orderByDesc('last_activity_at')->first();
    @endphp

    <div class="mb-8">
        <h1 class="h3">{{ __('Дашборд') }}</h1>
    </div>

    <div class="mb-8">
        <div class="grid grid-cols-3 gap-6">
            <div class="card p-6">
                <h5 class="mb-1">{{ \App\Models\User::count() }}</h5>
                <p class="text-slate-500">{{ __('Пользователей') }}</p>
            </div>

            <div class="card p-6">
                <h5 class="mb-1">{{ \App\Models\Referral::count() }}</h5>
                <p class="text-slate-500">{{ __('Рефералов') }}</p>
            </div>

            <div class="card p-6">
                <h5 class="mb-1"><x-tether :value="\App\Models\User::sum('balance')"></x-tether></h5>
                <p class="text-slate-500">{{ __('Баланс пользователей') }}</p>
            </div>

            <div class="card p-6">
                <h5 class="mb-1">{{ $lastActivity?->name ?? '-' }} : {{ $lastActivity?->last_activity_at->diffForHumans() ?? '-' }}</h5>
                <p class="text-slate-500">{{ __('Последняя активность') }}</p>
            </div>
        </div>
    </div>
@endsection
