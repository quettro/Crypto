@extends('layouts.superuser')

@section('title', $ip->id)
@section('description', __(''))

@section('content')
    <div class="mb-8">
        <h1 class="h3">{{ $ip->id }}</h1>
    </div>

    <div class="mb-8">
        <div class="flex items-center gap-2">
            <x-a-button-primary :href="route('superuser.ip.edit', $ip->id)">{{ __('Редактировать') }}</x-a-button-primary>

            <x-form :action="route('superuser.ip.destroy', $ip->id)">
                @method('DELETE')

                <x-button-danger>{{ __('Удалить') }}</x-button-danger>
            </x-form>
        </div>
    </div>

    <div class="mb-0">
        <ul class="card flex flex-col">
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Id') }}:</div>
                <div>{{ $ip->id }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Ip') }}:</div>
                <div>{{ $ip->ip }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Город') }}:</div>
                <div>{{ $ip->city }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Регион') }}:</div>
                <div>{{ $ip->region }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Регион - Код') }}:</div>
                <div>{{ $ip->region_code }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Регион - Наименование') }}:</div>
                <div>{{ $ip->region_name }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Страна - Код') }}:</div>
                <div>{{ $ip->country_code }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Страна - Наименование') }}:</div>
                <div>{{ $ip->country_name }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Континент - Код') }}:</div>
                <div>{{ $ip->continent_code }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Континент - Наименование') }}:</div>
                <div>{{ $ip->continent_name }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Часовой пояс') }}:</div>
                <div>{{ $ip->timezone }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Дата и время создания') }}:</div>
                <div>{{ $ip->created_at }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Дата и время обновления') }}:</div>
                <div>{{ $ip->updated_at }}</div>
            </li>
        </ul>
    </div>
@endsection
