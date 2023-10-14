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
                <x-form :action="route('superuser.setting.update')">
                    @method('PATCH')

                    <x-form-group>
                        <x-label for="contact">{{ __('[ Контакты ] Адрес электронной почты') }}</x-label>
                        <x-input id="contact" name="contact" :value="old('contact', $setting->contact)" :invalid="$errors->has('contact')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('contact')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="hcaptcha_public">{{ __('[ HCaptcha ] Public') }}</x-label>
                        <x-input id="hcaptcha_public" name="hcaptcha_public" :value="old('hcaptcha_public', $setting->hcaptcha_public)" :invalid="$errors->has('hcaptcha_public')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('hcaptcha_public')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="hcaptcha_secret">{{ __('[ HCaptcha ] Secret') }}</x-label>
                        <x-input id="hcaptcha_secret" name="hcaptcha_secret" :value="old('hcaptcha_secret', $setting->hcaptcha_secret)" :invalid="$errors->has('hcaptcha_secret')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('hcaptcha_secret')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="referral_program_parameter">{{ __('[ Реферальная программа ] Параметр') }}</x-label>
                        <x-input id="referral_program_parameter" name="referral_program_parameter" :value="old('referral_program_parameter', $setting->referral_program_parameter)" :invalid="$errors->has('referral_program_parameter')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('referral_program_parameter')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="referral_program_commission_percentage">{{ __('[ Реферальная программа ] Комиссия в процентах') }}</x-label>
                        <x-input id="referral_program_commission_percentage" name="referral_program_commission_percentage" :value="old('referral_program_commission_percentage', $setting->referral_program_commission_percentage)" :invalid="$errors->has('referral_program_commission_percentage')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('referral_program_commission_percentage')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="freebie_tether">{{ __('[ Кран ] Tether') }}</x-label>
                        <x-input id="freebie_tether" name="freebie_tether" :value="old('freebie_tether', $setting->freebie_tether)" :invalid="$errors->has('freebie_tether')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('freebie_tether')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="freebie_timeout">{{ __('[ Кран ] Таймаут в минутах') }}</x-label>
                        <x-input id="freebie_timeout" name="freebie_timeout" :value="old('freebie_timeout', $setting->freebie_timeout)" :invalid="$errors->has('freebie_timeout')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('freebie_timeout')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="freebie_limit_per_day">{{ __('[ Кран ] Лимит в день') }}</x-label>
                        <x-input id="freebie_limit_per_day" name="freebie_limit_per_day" :value="old('freebie_limit_per_day', $setting->freebie_limit_per_day)" :invalid="$errors->has('freebie_limit_per_day')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('freebie_limit_per_day')"></x-invalid-feedback>
                    </x-form-group>

                    <x-button-primary>{{ __('Сохранить') }}</x-button-primary>
                </x-form>
            </div>
        </div>
    </div>
@endsection
