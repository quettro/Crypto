@extends('layouts.clean')

@section('title', __('403'))
@section('description', __(''))

@section('content')
    <main class="h-[100%] flex justify-center items-center">
        <div class="w-[100%] max-w-xl px-[15px]">
            <section class="flex flex-col justify-center items-center gap-10 text-center">
                <h1>
                    {{ __('Доступ запрещен') }}</h1>

                <h5 class="text-slate-400 font-normal">
                    {{ __('К сожалению, Вы не можете получить доступ к этой странице. Это может быть связано с отсутствием необходимых прав или нарушением политики сайта. Пожалуйста, свяжитесь с администратором сайта для получения дополнительной информации.') }}</h5>

                <x-a-button-primary :href="route('welcome')" :title="__('Вернуться домой')">
                    {{ __('Вернуться домой') }}</x-a-button-primary>
            </section>
        </div>
    </main>
@endsection
