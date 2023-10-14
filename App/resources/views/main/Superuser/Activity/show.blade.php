@extends('layouts.superuser')

@section('title', $activity->id)
@section('description', __(''))

@section('content')
    <div class="mb-8">
        <h1 class="h3">{{ $activity->id }}</h1>
    </div>

    <div class="mb-8">
        <div class="flex items-center gap-2">
            <x-a-button-primary :href="route('superuser.activity.edit', $activity->id)">{{ __('Редактировать') }}</x-a-button-primary>
        </div>
    </div>

    <div class="mb-8">
        <ul class="card flex flex-col">
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Id') }}:</div>
                <div>{{ $activity->id }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Сообщение') }}:</div>
                <div>{{ $activity->message }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Ip') }}:</div>
                <div>{{ $activity->ip?->ip }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('User-Agent') }}:</div>
                <div>{{ $activity->userAgent?->user_agent }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Пользователь') }}:</div>
                <div>{{ $activity->user?->email }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Дата и время создания') }}:</div>
                <div>{{ $activity->created_at }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Дата и время обновления') }}:</div>
                <div>{{ $activity->updated_at }}</div>
            </li>
        </ul>
    </div>

    <div class="mb-0">
        <div class="card p-8">
            <div class="mb-8">
                <h5>{{ __('Доп. данные') }}</h5>
            </div>
            <pre class="border-l pl-8 overflow-x-auto">@php var_dump($activity->payload); @endphp</pre>
        </div>
    </div>
@endsection
