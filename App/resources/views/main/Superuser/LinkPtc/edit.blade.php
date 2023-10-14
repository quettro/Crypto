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
                <x-form :action="route('superuser.link-ptc.update', $linkPtc->id)">
                    @method('PATCH')

                    <x-form-group>
                        <x-label for="uniqid">{{ __('Uniqid') }}</x-label>
                        <x-input id="uniqid" name="uniqid" :value="old('uniqid', $linkPtc->uniqid)" :invalid="$errors->has('uniqid')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('uniqid')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="status">{{ __('Статус') }}</x-label>
                        <x-select id="status" name="status" :option="\App\Enums\LinkPtc\StatusEnum::asSelectArray()" :o_selected="[old('status', $linkPtc->status->value)]" :invalid="$errors->has('status')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('status')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="link_id">{{ __('Ссылка') }}</x-label>
                        <x-select id="link_id" name="link_id" :option="\App\Models\Link::get()->pluck('name', 'id')->toArray()" :o_selected="[old('link_id', $linkPtc->link_id)]" :invalid="$errors->has('link_id')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('link_id')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="ip_id">{{ __('Ip') }}</x-label>
                        <x-select id="ip_id" name="ip_id" :option="\App\Models\Ip::get()->pluck('ip', 'id')->toArray()" :o_selected="[old('ip_id', $linkPtc->ip_id)]" :invalid="$errors->has('ip_id')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('ip_id')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="user_agent_id">{{ __('User-Agent') }}</x-label>
                        <x-select id="user_agent_id" name="user_agent_id" :option="\App\Models\UserAgent::get()->pluck('user_agent', 'id')->toArray()" :o_selected="[old('user_agent_id', $linkPtc->user_agent_id)]" :invalid="$errors->has('user_agent_id')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('user_agent_id')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="user_id">{{ __('Пользователь') }}</x-label>
                        <x-select id="user_id" name="user_id" :option="\App\Models\User::get()->pluck('email', 'id')->toArray()" :o_selected="[old('user_id', $linkPtc->user_id)]" :invalid="$errors->has('user_id')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('user_id')"></x-invalid-feedback>
                    </x-form-group>

                    <x-button-primary>{{ __('Сохранить') }}</x-button-primary>
                </x-form>
            </div>
        </div>
    </div>
@endsection
