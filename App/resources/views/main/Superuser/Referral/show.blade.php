@extends('layouts.superuser')

@section('title', $referral->id)
@section('description', __(''))

@section('content')
    <div class="mb-8">
        <h1 class="h3">{{ $referral->id }}</h1>
    </div>

    <div class="mb-8">
        <div class="flex items-center gap-2">
            <x-a-button-primary :href="route('superuser.referral.edit', $referral->id)">{{ __('Редактировать') }}</x-a-button-primary>

            <x-form :action="route('superuser.referral.destroy', $referral->id)">
                @method('DELETE')

                <x-button-danger>{{ __('Удалить') }}</x-button-danger>
            </x-form>
        </div>
    </div>

    <div class="mb-0">
        <ul class="card flex flex-col">
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Id') }}:</div>
                <div>{{ $referral->id }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Реферал') }}:</div>
                <div>{{ $referral->referral?->email }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Реферер') }}:</div>
                <div>{{ $referral->referrer?->email }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Дата и время создания') }}:</div>
                <div>{{ $referral->created_at }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Дата и время обновления') }}:</div>
                <div>{{ $referral->updated_at }}</div>
            </li>
        </ul>
    </div>
@endsection
