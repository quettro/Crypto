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
                <x-form :action="route('superuser.user-achievement.store')">
                    <x-form-group>
                        <x-label for="progress">{{ __('Прогресс') }}</x-label>
                        <x-input id="progress" name="progress" :value="old('progress')" :invalid="$errors->has('progress')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('progress')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="completed_at">{{ __('Дата и время получения достижения') }}</x-label>
                        <x-input id="completed_at" name="completed_at" :value="old('completed_at')" :invalid="$errors->has('completed_at')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('completed_at')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="achievement_id">{{ __('Достижение') }}</x-label>
                        <x-select id="achievement_id" name="achievement_id" :option="\App\Models\Achievement::get()->pluck('description', 'id')->toArray()" :o_selected="[old('achievement_id')]" :invalid="$errors->has('achievement_id')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('achievement_id')"></x-invalid-feedback>
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
