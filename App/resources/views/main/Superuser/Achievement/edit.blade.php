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
                <x-form :action="route('superuser.achievement.update', $achievement->id)">
                    @method('PATCH')

                    <x-form-group>
                        <x-label for="type">{{ __('Тип') }}</x-label>
                        <x-select id="type" name="type" :option="\App\Enums\Achievement\TypeEnum::asSelectArray()" :o_selected="[old('type', $achievement->type->value)]" :invalid="$errors->has('type')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('type')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="description">{{ __('Текстовое описание') }}</x-label>
                        <x-input id="description" name="description" :value="old('description', $achievement->description)" :invalid="$errors->has('description')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('description')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="tether">{{ __('Награда') }}</x-label>
                        <x-input id="tether" name="tether" :value="old('tether', $achievement->tether)" :invalid="$errors->has('tether')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('tether')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="purpose">{{ __('Цель') }}</x-label>
                        <x-input id="purpose" name="purpose" :value="old('purpose', $achievement->purpose)" :invalid="$errors->has('purpose')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('purpose')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="status">{{ __('Статус') }}</x-label>
                        <x-select id="status" name="status" :option="\App\Enums\Achievement\StatusEnum::asSelectArray()" :o_selected="[old('status', $achievement->status->value)]" :invalid="$errors->has('status')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('status')"></x-invalid-feedback>
                    </x-form-group>

                    <x-button-primary>{{ __('Сохранить') }}</x-button-primary>
                </x-form>
            </div>
        </div>
    </div>
@endsection
