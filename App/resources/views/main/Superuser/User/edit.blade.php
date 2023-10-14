@extends('layouts.superuser')

@section('title', __('Редактирование'))
@section('description', __(''))

@section('content')
    <div class="mb-8">
        <h1 class="h3">{{ __('Редактирование') }}</h1>
    </div>

    <div class="mb-0">
        <div class="card p-8">
            <div class="max-w-xl">
                <x-form :action="route('superuser.user.update', $user->id)">
                    @method('PATCH')

                    <x-form-group>
                        <x-label for="name">{{ __('Имя') }}</x-label>
                        <x-input id="name" name="name" :value="old('name', $user->name)" :invalid="$errors->has('name')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('name')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="email">{{ __('Адрес электронной почты') }}</x-label>
                        <x-input id="email" name="email" :value="old('email', $user->email)" :invalid="$errors->has('email')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('email')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="email_verified_at">{{ __('Дата и время подтверждения') }}</x-label>
                        <x-input id="email_verified_at" name="email_verified_at" :value="old('email_verified_at', $user->email_verified_at)" :invalid="$errors->has('email_verified_at')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('email_verified_at')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="password">{{ __('Новый пароль') }}</x-label>
                        <x-input id="password" type="password" name="password" :value="old('password')" :invalid="$errors->has('password')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('password')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="remember_token">{{ __('Токен `Запомнить меня`') }}</x-label>
                        <x-input id="remember_token" name="remember_token" :value="old('remember_token', $user->remember_token)" :invalid="$errors->has('remember_token')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('remember_token')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="status">{{ __('Статус') }}</x-label>
                        <x-select id="status" name="status" :option="\App\Enums\User\StatusEnum::asSelectArray()" :o_selected="[old('status', $user->status->value)]" :invalid="$errors->has('status')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('status')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="superuser">{{ __('Суперпользователь') }}</x-label>
                        <x-select id="superuser" name="superuser" :option="\App\Enums\User\SuperuserEnum::asSelectArray()" :o_selected="[old('superuser', $user->superuser->value)]" :invalid="$errors->has('superuser')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('superuser')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="balance">{{ __('Баланс') }}</x-label>
                        <x-input id="balance" name="balance" :value="old('balance', $user->balance)" :invalid="$errors->has('balance')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('balance')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="ip_id">{{ __('Ip') }}</x-label>
                        <x-select id="ip_id" name="ip_id" :option="\App\Models\Ip::get()->pluck('ip', 'id')->toArray()" :o_selected="[old('ip_id', $user->ip_id)]" :invalid="$errors->has('ip_id')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('ip_id')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="user_agent_id">{{ __('User-Agent') }}</x-label>
                        <x-select id="user_agent_id" name="user_agent_id" :option="\App\Models\UserAgent::get()->pluck('user_agent', 'id')->toArray()" :o_selected="[old('user_agent_id', $user->user_agent_id)]" :invalid="$errors->has('user_agent_id')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('user_agent_id')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="referer">{{ __('Referer') }}</x-label>
                        <x-input id="referer" name="referer" :value="old('referer', $user->referer)" :invalid="$errors->has('referer')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('referer')"></x-invalid-feedback>
                    </x-form-group>

                    <x-button-primary>{{ __('Сохранить') }}</x-button-primary>
                </x-form>
            </div>
        </div>
    </div>
@endsection
