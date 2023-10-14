@extends('layouts.superuser')

@section('title', $achievement->id)
@section('description', __(''))

@section('content')
    <div class="mb-8">
        <h1 class="h3">{{ $achievement->id }}</h1>
    </div>

    <div class="mb-8">
        <div class="flex items-center gap-2">
            <x-a-button-primary :href="route('superuser.achievement.edit', $achievement->id)">{{ __('Редактировать') }}</x-a-button-primary>

            <x-form :action="route('superuser.achievement.destroy', $achievement->id)">
                @method('DELETE')

                <x-button-danger>{{ __('Удалить') }}</x-button-danger>
            </x-form>
        </div>
    </div>

    <div class="mb-0">
        <ul class="card flex flex-col">
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Id') }}:</div>
                <div>{{ $achievement->id }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Тип') }}:</div>
                <div>{{ $achievement->type->description }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Текстовое описание') }}:</div>
                <div>{{ $achievement->description }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Награда') }}:</div>
                <div>{{ $achievement->tether }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Цель') }}:</div>
                <div>{{ $achievement->purpose }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Статус') }}:</div>
                <div>{{ $achievement->status->description }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Дата и время создания') }}:</div>
                <div>{{ $achievement->created_at }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Дата и время обновления') }}:</div>
                <div>{{ $achievement->updated_at }}</div>
            </li>
        </ul>
    </div>
@endsection
