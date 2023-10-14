@extends('layouts.superuser')

@section('title', __('Настройки'))

@section('content')
    <div class="mb-8">
        <h1 class="h3">{{ __('Настройки') }}</h1>
    </div>

    <div class="mb-8">
        <div class="flex items-center gap-2">
            <x-a-button-primary :href="route('superuser.setting.edit')">{{ __('Редактировать') }}</x-a-button-primary>
        </div>
    </div>

    <div class="mb-0">
        <ul class="card flex flex-col">
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Id') }}:</div>
                <div>{{ $setting->id }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('[ Контакты ] Адрес электронной почты') }}:</div>
                <div>{{ $setting->contact }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('[ HCaptcha ] Public') }}:</div>
                <div>{{ $setting->hcaptcha_public }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('[ HCaptcha ] Secret') }}:</div>
                <div>{{ $setting->hcaptcha_secret }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('[ Реферальная программа ] Параметр') }}:</div>
                <div>{{ $setting->referral_program_parameter }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('[ Реферальная программа ] Комиссия в процентах') }}:</div>
                <div>{{ $setting->referral_program_commission_percentage }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('[ Кран ] Tether') }}:</div>
                <div>{{ $setting->freebie_tether }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('[ Кран ] Таймаут в минутах') }}:</div>
                <div>{{ $setting->freebie_timeout }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('[ Кран ] Лимит в день') }}:</div>
                <div>{{ $setting->freebie_limit_per_day }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Дата и время создания') }}:</div>
                <div>{{ $setting->created_at }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Дата и время обновления') }}:</div>
                <div>{{ $setting->updated_at }}</div>
            </li>
        </ul>
    </div>
@endsection
