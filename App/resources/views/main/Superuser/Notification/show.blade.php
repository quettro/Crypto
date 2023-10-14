@extends('layouts.superuser')

@section('title', $notification->id)
@section('description', __(''))

@section('content')
    <div class="mb-8">
        <h1 class="h3">{{ $notification->id }}</h1>
    </div>

    <div class="mb-8">
        <div class="flex items-center gap-2">
            <x-form :action="route('superuser.notification.destroy', $notification->id)">
                @method('DELETE')

                <x-button-danger>{{ __('Удалить') }}</x-button-danger>
            </x-form>
        </div>
    </div>

    <div class="mb-8">
        <ul class="card flex flex-col">
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Id') }}:</div>
                <div>{{ $notification->id }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Тип') }}:</div>
                <div>{{ $notification->type }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Модель') }}:</div>
                <div>{{ $notification->notifiable_type }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Идентификатор') }}:</div>
                <div>{{ $notification->notifiable_id }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Прочитано') }}:</div>
                <div>{{ $notification->read_at }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Дата и время создания') }}:</div>
                <div>{{ $notification->created_at }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Дата и время обновления') }}:</div>
                <div>{{ $notification->updated_at }}</div>
            </li>
        </ul>
    </div>

    <div class="mb-0">
        <div class="card p-8">
            <pre class="border-l pl-8 overflow-x-auto">@php var_dump($notification->data); @endphp</pre>
        </div>
    </div>
@endsection
