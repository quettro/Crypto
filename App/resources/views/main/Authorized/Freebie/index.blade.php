@extends('layouts.authorized')

@section('title', __('Кран'))
@section('description', __(''))

@section('content')
    <div class="mb-8">
        <h1 class="h3">{{ __('Кран') }}</h1>
    </div>

    <div class="mb-8">
        <div class="grid grid-cols-3 gap-8">
            <div class="card p-6">
                <div class="flex items-center gap-6">
                    <div class="w-[52px] h-[52px] flex justify-center items-center text-center rounded-[10rem] bg-indigo-100 text-[15.75px] text-indigo-600">
                        <i class="fa-solid fa-dollar-sign fa-fw fa-sm"></i>
                    </div>

                    <div class="flex flex-col gap-1">
                        <h5 class="">
                            <x-tether :value="setting()->freebie_tether"></x-tether>
                        </h5>
                        <p class="text-slate-500">{{ __('Награда') }}</p>
                    </div>
                </div>
            </div>

            <div class="card p-6">
                <div class="flex items-center gap-6">
                    <div class="w-[52px] h-[52px] flex justify-center items-center text-center rounded-[10rem] bg-indigo-100 text-[15.75px] text-indigo-600">
                        <i class="fa-solid fa-clock fa-fw fa-sm"></i>
                    </div>

                    <div class="flex flex-col gap-1">
                        <h5 class="">
                            {{ setting()->freebie_timeout }} {{ __('мин.') }}
                        </h5>
                        <p class="text-slate-500">{{ __('Таймаут') }}</p>
                    </div>
                </div>
            </div>

            <div class="card p-6">
                <div class="flex items-center gap-6">
                    <div class="w-[52px] h-[52px] flex justify-center items-center text-center rounded-[10rem] bg-indigo-100 text-[15.75px] text-indigo-600">
                        <i class="fa-solid fa-faucet fa-fw fa-sm"></i>
                    </div>

                    <div class="flex flex-col gap-1">
                        <h5 class="">
                            {{ setting()->freebie_limit_per_day }}
                        </h5>
                        <p class="text-slate-500">{{ __('Ежедневный лимит') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-0">
        <div class="card p-8">
            <div class="mb-8 flex items-center gap-4">
                <div class="w-[36px] h-[36px] flex justify-center items-center rounded-lg bg-indigo-50 text-indigo-600 border border-indigo-100">
                    <i class="fa-solid fa-hand-holding-dollar fa-fw fa-sm"></i>
                </div>
                <div class="h5 !font-semibold">{{ __('Форма') }}</div>
            </div>

            <div class="mb-0">
                <div class="max-w-xl">
                    <x-form :action="route('freebie.store')">
                        <x-form-group>
                            <x-label for="">{{ __('Я не робот') }}</x-label>
                            <x-hcaptcha :k="setting()->hcaptcha_public"></x-hcaptcha>
                            <x-invalid-feedback :messages="$errors->get('h-captcha-response')"></x-invalid-feedback>
                        </x-form-group>

                        @if(session('success'))
                            <x-form-group>
                                <div class="font-medium text-green-600">
                                    {{ session('success') }}
                                </div>
                            </x-form-group>
                        @endif

                        @if($errors->get('error'))
                            <x-form-group>
                                <div class="font-medium text-red-600">
                                    {{ $errors->first('error') }}
                                </div>
                            </x-form-group>
                        @endif

                        <x-button-primary>{{ __('Получить') }}</x-button-primary>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
@endsection
