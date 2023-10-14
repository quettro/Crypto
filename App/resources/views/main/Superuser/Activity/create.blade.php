@extends('layouts.superuser')

@section('title', __('Новая запись'))
@section('description', __(''))

@section('content')
    <div class="mb-8">
        <h1 class="h3">{{ __('Новая запись') }}</h1>
    </div>

    <div class="mb-0">
        <div class="card p-8">
            <div class="max-w-xl">
                <x-form :action="route('superuser.activity.store')">
                    <x-form-group>
                        <x-label for="message">{{ __('Сообщение') }}</x-label>
                        <x-textarea id="message" name="message" :value="old('message')" :invalid="$errors->has('message')"></x-textarea>
                        <x-invalid-feedback :messages="$errors->get('message')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="ip_id">{{ __('Ip') }}</x-label>
                        <x-select id="ip_id" name="ip_id" :option="\App\Models\Ip::get()->pluck('ip', 'id')->toArray()" :o_selected="[old('ip_id')]" :invalid="$errors->has('ip_id')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('ip_id')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="user_agent_id">{{ __('User-Agent') }}</x-label>
                        <x-select id="user_agent_id" name="user_agent_id" :option="\App\Models\UserAgent::get()->pluck('user_agent', 'id')->toArray()" :o_selected="[old('user_agent_id')]" :invalid="$errors->has('user_agent_id')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('user_agent_id')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="user_id">{{ __('Пользователь') }}</x-label>
                        <x-select id="user_id" name="user_id" :option="\App\Models\User::get()->pluck('email', 'id')->toArray()" :o_selected="[old('user_id')]" :invalid="$errors->has('user_id')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('user_id')"></x-invalid-feedback>
                    </x-form-group>

                    <x-button-primary>{{ __('Сохранить') }}</x-button-primary>
                </x-form>
            </div>
        </div>
    </div>
@endsection
