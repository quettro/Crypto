@extends('layouts.clean')

@section('title', __('404'))
@section('description', __(''))

@section('content')
    <main class="h-[100%] flex justify-center items-center">
        <div class="w-[100%] max-w-xl px-[15px]">
            <section class="flex flex-col justify-center items-center gap-10 text-center">
                <h1>
                    {{ __('Упс, мы не нашли эту страницу') }}</h1>

                <h5 class="text-slate-400 font-normal">
                    {{ __('Такой страницы нет. Возможно, Вы перешли по неработающей ссылке или неверно ввели адрес. Некоторые адреса страниц чувствительны к регистру.') }}</h5>

                <x-a-button-primary :href="route('welcome')" :title="__('Вернуться домой')">
                    {{ __('Вернуться домой') }}</x-a-button-primary>
            </section>
        </div>
    </main>
@endsection
