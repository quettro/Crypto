@extends('layouts.authorized')

@section('title', __('Настройки'))
@section('description', __(''))

@section('content')
    <div class="mb-8">
        <h1 class="h3">{{ __('Настройки') }}</h1>
    </div>

    <div class="mb-8">
        <div class="card p-8">
            <div class="mb-8 flex items-center gap-4">
                <div class="w-[36px] h-[36px] flex justify-center items-center rounded-lg bg-indigo-50 text-indigo-600 border border-indigo-100">
                    <i class="fa-solid fa-info fa-fw fa-sm"></i>
                </div>
                <div class="h5 !font-semibold">{{ __('Данные') }}</div>
            </div>

            <div class="mb-0">
                <div class="grid grid-cols-2 gap-8">
                    <div class="">
                        <x-label for="name">{{ __('Имя пользователя') }}</x-label>
                        <x-input id="name" name="name" :value="Auth::user()->name" :disabled="true"></x-input>
                    </div>

                    <div class="">
                        <x-label for="email">{{ __('Адрес электронной почты') }}</x-label>
                        <x-input id="email" name="email" :value="Auth::user()->email" :disabled="true"></x-input>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-0">
        <div class="card p-8">
            <div class="mb-8 flex items-center gap-4">
                <div class="w-[36px] h-[36px] flex justify-center items-center rounded-lg bg-indigo-50 text-indigo-600 border border-indigo-100">
                    <i class="fa-solid fa-lock fa-fw fa-sm"></i>
                </div>
                <div class="h5 !font-semibold">{{ __('Сменить пароль') }}</div>
            </div>

            <div class="mb-0">
                <div class="max-w-xl">
                    <x-form :action="route('settings.password.update')">
                        @method('PATCH')

                        <x-form-group>
                            <x-label for="current_password">{{ __('Текущий пароль') }}</x-label>
                            <x-input id="current_password" type="password" name="current_password" :invalid="$errors->has('current_password')" autocomplete="new-password" required=""></x-input>
                            <x-invalid-feedback :messages="$errors->get('current_password')"></x-invalid-feedback>
                        </x-form-group>

                        <x-form-group>
                            <x-label for="password">{{ __('Новый пароль') }}</x-label>
                            <x-input id="password" type="password" name="password" :invalid="$errors->has('password')" autocomplete="new-password" required=""></x-input>
                            <x-invalid-feedback :messages="$errors->get('password')"></x-invalid-feedback>
                        </x-form-group>

                        <x-form-group>
                            <x-label for="password_confirmation">{{ __('Подтвердите новый пароль') }}</x-label>
                            <x-input id="password_confirmation" type="password" name="password_confirmation" :invalid="$errors->has('password_confirmation')" autocomplete="new-password" required=""></x-input>
                            <x-invalid-feedback :messages="$errors->get('password_confirmation')"></x-invalid-feedback>
                        </x-form-group>

                        @if($message = session('settings.password.success'))
                            <x-form-group>
                                <div class="font-medium text-green-600">
                                    {{ $message }}
                                </div>
                            </x-form-group>
                        @endif

                        <x-button-primary>{{ __('Сохранить') }}</x-button-primary>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
@endsection
