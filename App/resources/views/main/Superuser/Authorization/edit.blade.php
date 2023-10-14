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
                <x-form :action="route('superuser.authorization.update', $authorization->id)">
                    @method('PATCH')

                    <x-form-group>
                        <x-label for="code">{{ __('Код') }}</x-label>
                        <x-select id="code" name="code" :option="\App\Enums\Authorization\CodeEnum::asSelectArray()" :o_selected="[old('code', $authorization->code->value)]" :invalid="$errors->has('code')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('code')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="ip_id">{{ __('Ip') }}</x-label>
                        <x-select id="ip_id" name="ip_id" :option="\App\Models\Ip::get()->pluck('ip', 'id')->toArray()" :o_selected="[old('ip_id', $authorization->ip_id)]" :invalid="$errors->has('ip_id')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('ip_id')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="user_agent_id">{{ __('User-Agent') }}</x-label>
                        <x-select id="user_agent_id" name="user_agent_id" :option="\App\Models\UserAgent::get()->pluck('user_agent', 'id')->toArray()" :o_selected="[old('user_agent_id', $authorization->user_agent_id)]" :invalid="$errors->has('user_agent_id')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('user_agent_id')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="user_id">{{ __('Пользователь') }}</x-label>
                        <x-select id="user_id" name="user_id" :option="\App\Models\User::get()->pluck('email', 'id')->toArray()" :o_selected="[old('user_id', $authorization->user_id)]" :invalid="$errors->has('user_id')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('user_id')"></x-invalid-feedback>
                    </x-form-group>

                    <x-button-primary>{{ __('Сохранить') }}</x-button-primary>
                </x-form>
            </div>
        </div>
    </div>
@endsection
