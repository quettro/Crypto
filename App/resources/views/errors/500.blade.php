@extends('layouts.clean')

@section('title', __('500'))
@section('description', __(''))

@section('content')
    <main class="h-[100%] flex justify-center items-center">
        <div class="w-[100%] max-w-xl px-[15px]">
            <section class="flex flex-col justify-center items-center gap-10 text-center">
                <h1>
                    {{ __('Ошибка сервера') }}</h1>

                <h5 class="text-slate-400 font-normal">
                    {{ __('Извините, произошла внутренняя ошибка сервера. Мы уже знаем о проблеме и работаем над ее устранением. Пожалуйста, попробуйте зайти на страницу позже. Если проблема сохраняется, пожалуйста, свяжитесь с нами для получения дополнительной помощи.') }}</h5>

                <x-a-button-primary :href="route('welcome')" :title="__('Вернуться домой')">
                    {{ __('Вернуться домой') }}</x-a-button-primary>
            </section>
        </div>
    </main>
@endsection
