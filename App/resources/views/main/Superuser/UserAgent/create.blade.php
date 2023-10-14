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
                <x-form :action="route('superuser.user-agent.store')">
                    <x-form-group>
                        <x-label for="ua">{{ __('Ua') }}</x-label>
                        <x-input id="ua" name="ua" :value="old('ua')" :invalid="$errors->has('ua')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('ua')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="ua_major">{{ __('Ua Major') }}</x-label>
                        <x-input id="ua_major" name="ua_major" :value="old('ua_major')" :invalid="$errors->has('ua_major')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('ua_major')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="ua_minor">{{ __('Ua Minor') }}</x-label>
                        <x-input id="ua_minor" name="ua_minor" :value="old('ua_minor')" :invalid="$errors->has('ua_minor')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('ua_minor')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="ua_patch">{{ __('Ua Patch') }}</x-label>
                        <x-input id="ua_patch" name="ua_patch" :value="old('ua_patch')" :invalid="$errors->has('ua_patch')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('ua_patch')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="os">{{ __('Os') }}</x-label>
                        <x-input id="os" name="os" :value="old('os')" :invalid="$errors->has('os')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('os')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="os_major">{{ __('Os Major') }}</x-label>
                        <x-input id="os_major" name="os_major" :value="old('os_major')" :invalid="$errors->has('os_major')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('os_major')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="os_minor">{{ __('Os Minor') }}</x-label>
                        <x-input id="os_minor" name="os_minor" :value="old('os_minor')" :invalid="$errors->has('os_minor')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('os_minor')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="os_patch">{{ __('Os Patch') }}</x-label>
                        <x-input id="os_patch" name="os_patch" :value="old('os_patch')" :invalid="$errors->has('os_patch')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('os_patch')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="device">{{ __('Device') }}</x-label>
                        <x-input id="device" name="device" :value="old('device')" :invalid="$errors->has('device')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('device')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="device_brand">{{ __('Device Brand') }}</x-label>
                        <x-input id="device_brand" name="device_brand" :value="old('device_brand')" :invalid="$errors->has('device_brand')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('device_brand')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="device_model">{{ __('Device Model') }}</x-label>
                        <x-input id="device_model" name="device_model" :value="old('device_model')" :invalid="$errors->has('device_model')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('device_model')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="user_agent">{{ __('User-Agent') }}</x-label>
                        <x-input id="user_agent" name="user_agent" :value="old('user_agent')" :invalid="$errors->has('user_agent')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('user_agent')"></x-invalid-feedback>
                    </x-form-group>

                    <x-button-primary>{{ __('Сохранить') }}</x-button-primary>
                </x-form>
            </div>
        </div>
    </div>
@endsection
