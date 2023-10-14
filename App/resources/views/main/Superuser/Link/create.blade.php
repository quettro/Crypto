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
                <x-form :action="route('superuser.link.store')">
                    <x-form-group>
                        <x-label for="name">{{ __('Имя') }}</x-label>
                        <x-input id="name" name="name" :value="old('name')" :invalid="$errors->has('name')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('name')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="route">{{ __('Ссылка') }}</x-label>
                        <x-input id="route" name="route" :value="old('route')" :invalid="$errors->has('route')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('route')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="tether">{{ __('Награда') }}</x-label>
                        <x-input id="tether" name="tether" :value="old('tether')" :invalid="$errors->has('tether')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('tether')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="limit_per_day">{{ __('Лимит в день') }}</x-label>
                        <x-input id="limit_per_day" name="limit_per_day" :value="old('limit_per_day')" :invalid="$errors->has('limit_per_day')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('limit_per_day')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="status">{{ __('Статус') }}</x-label>
                        <x-select id="status" name="status" :option="\App\Enums\Link\StatusEnum::asSelectArray()" :o_selected="[old('status')]" :invalid="$errors->has('status')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('status')"></x-invalid-feedback>
                    </x-form-group>

                    <x-button-primary>{{ __('Сохранить') }}</x-button-primary>
                </x-form>
            </div>
        </div>
    </div>
@endsection
