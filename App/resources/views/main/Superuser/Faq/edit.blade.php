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
                <x-form :action="route('superuser.faq.update', $faq->id)">
                    @method('PATCH')

                    <x-form-group>
                        <x-label for="q">{{ __('Вопрос') }}</x-label>
                        <x-textarea id="q" name="q" :value="old('q', $faq->q)" :invalid="$errors->has('q')"></x-textarea>
                        <x-invalid-feedback :messages="$errors->get('q')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="a">{{ __('Ответ') }}</x-label>
                        <x-textarea id="a" name="a" :value="old('a', $faq->a)" :invalid="$errors->has('a')"></x-textarea>
                        <x-invalid-feedback :messages="$errors->get('a')"></x-invalid-feedback>
                    </x-form-group>

                    <x-button-primary>{{ __('Сохранить') }}</x-button-primary>
                </x-form>
            </div>
        </div>
    </div>
@endsection
