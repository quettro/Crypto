@extends('layouts.superuser')

@section('title', $userAchievement->id)
@section('description', __(''))

@section('content')
    <div class="mb-8">
        <h1 class="h3">{{ $userAchievement->id }}</h1>
    </div>

    <div class="mb-8">
        <div class="flex items-center gap-2">
            <x-a-button-primary :href="route('superuser.user-achievement.edit', $userAchievement->id)">{{ __('Редактировать') }}</x-a-button-primary>

            <x-form :action="route('superuser.user-achievement.destroy', $userAchievement->id)">
                @method('DELETE')

                <x-button-danger>{{ __('Удалить') }}</x-button-danger>
            </x-form>
        </div>
    </div>

    <div class="mb-0">
        <ul class="card flex flex-col">
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Id') }}:</div>
                <div>{{ $userAchievement->id }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Прогресс') }}:</div>
                <div>{{ $userAchievement->progress }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Дата и время получения достижения') }}:</div>
                <div>{{ $userAchievement->completed_at }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Достижение') }}:</div>
                <div>{{ $userAchievement->achievement?->description }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Пользователь') }}:</div>
                <div>{{ $userAchievement->user?->email }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Дата и время создания') }}:</div>
                <div>{{ $userAchievement->created_at }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Дата и время обновления') }}:</div>
                <div>{{ $userAchievement->updated_at }}</div>
            </li>
        </ul>
    </div>
@endsection
