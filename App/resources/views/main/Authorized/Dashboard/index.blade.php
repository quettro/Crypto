@extends('layouts.authorized')

@section('title', __('Дашборд'))
@section('description', __(''))

@section('content')
    @if (!Auth::user()->hasVerifiedEmail())
        <div class="mb-8">
            <div class="bg-slate-100 text-slate-600 border border-slate-200 p-[14px] rounded-lg">
                {{ __('Спасибо, что зарегистрировались! Необходимо подтвердить свой адрес электронной почты, перейдя по ссылке, которую мы только что отправили вам по электронной почте. Если Вы не получили электронное письмо, мы с радостью отправим вам другое.') }}

                <x-form :action="route('verification.send')" class="inline">
                    <button type="submit" class="text-slate-800 underline">{{ __('Повторно отправить письмо.') }}</button>
                </x-form>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mt-2">
                    <div class="font-medium text-green-600">
                        {{ __('Новая ссылка для подтверждения успешно была отправлена на адрес электронной почты, который Вы указали при регистрации.') }}
                    </div>
                </div>
            @endif
        </div>
    @endif

    <div class="mb-8">
        <h1 class="h3">{{ __('Дашборд') }}</h1>
    </div>

    <div class="mb-0">
        <div class="grid grid-cols-3 gap-6">
            <div class="card p-6">
                <div class="flex items-center gap-6">
                    <div class="w-[52px] h-[52px] flex justify-center items-center text-center rounded-[10rem] bg-indigo-100 text-[15.75px] text-indigo-600">
                        <i class="fa-solid fa-dollar-sign fa-fw fa-sm"></i>
                    </div>

                    <div class="flex flex-col gap-1">
                        <h5 class="">
                            <x-tether :value="Auth::user()->balance"></x-tether>
                        </h5>
                        <p class="text-slate-500">{{ __('Баланс') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
