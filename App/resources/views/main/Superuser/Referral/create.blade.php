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
                <x-form :action="route('superuser.referral.store')">
                    <x-form-group>
                        <x-label for="referral_id">{{ __('Реферал') }}</x-label>
                        <x-select id="referral_id" name="referral_id" :option="\App\Models\User::get()->pluck('email', 'id')->toArray()" :o_selected="[old('referral_id')]" :invalid="$errors->has('referral_id')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('referral_id')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="referrer_id">{{ __('Реферер') }}</x-label>
                        <x-select id="referrer_id" name="referrer_id" :option="\App\Models\User::get()->pluck('email', 'id')->toArray()" :o_selected="[old('referrer_id')]" :invalid="$errors->has('referrer_id')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('referrer_id')"></x-invalid-feedback>
                    </x-form-group>

                    <x-button-primary>{{ __('Сохранить') }}</x-button-primary>
                </x-form>
            </div>
        </div>
    </div>
@endsection
