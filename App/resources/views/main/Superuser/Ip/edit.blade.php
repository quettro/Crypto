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
                <x-form :action="route('superuser.ip.update', $ip->id)">
                    @method('PATCH')

                    <x-form-group>
                        <x-label for="ip">{{ __('Ip') }}</x-label>
                        <x-input id="ip" name="ip" :value="old('ip', $ip->ip)" :invalid="$errors->has('ip')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('ip')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="city">{{ __('Город') }}</x-label>
                        <x-input id="city" name="city" :value="old('city', $ip->city)" :invalid="$errors->has('city')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('city')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="region">{{ __('Регион') }}</x-label>
                        <x-input id="region" name="region" :value="old('region', $ip->region)" :invalid="$errors->has('region')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('region')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="region_code">{{ __('Регион - Код') }}</x-label>
                        <x-input id="region_code" name="region_code" :value="old('region_code', $ip->region_code)" :invalid="$errors->has('region_code')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('region_code')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="region_name">{{ __('Регион - Наименование') }}</x-label>
                        <x-input id="region_name" name="region_name" :value="old('region_name', $ip->region_name)" :invalid="$errors->has('region_name')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('region_name')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="country_code">{{ __('Страна - Код') }}</x-label>
                        <x-input id="country_code" name="country_code" :value="old('country_code', $ip->country_code)" :invalid="$errors->has('country_code')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('country_code')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="country_name">{{ __('Страна - Наименование') }}</x-label>
                        <x-input id="country_name" name="country_name" :value="old('country_name', $ip->country_name)" :invalid="$errors->has('country_name')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('country_name')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="continent_code">{{ __('Континент - Код') }}</x-label>
                        <x-input id="continent_code" name="continent_code" :value="old('continent_code', $ip->continent_code)" :invalid="$errors->has('continent_code')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('continent_code')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="continent_name">{{ __('Континент - Наименование') }}</x-label>
                        <x-input id="continent_name" name="continent_name" :value="old('continent_name', $ip->continent_name)" :invalid="$errors->has('continent_name')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('continent_name')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="timezone">{{ __('Часовой пояс') }}</x-label>
                        <x-input id="timezone" name="timezone" :value="old('timezone', $ip->timezone)" :invalid="$errors->has('timezone')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('timezone')"></x-invalid-feedback>
                    </x-form-group>

                    <x-button-primary>{{ __('Сохранить') }}</x-button-primary>
                </x-form>
            </div>
        </div>
    </div>
@endsection
