@extends('layouts.clean')

@section('title', __('503'))
@section('description', __(''))

@section('content')
    <main class="h-[100%] flex justify-center items-center">
        <div class="w-[100%] max-w-xl px-[15px]">
            <section class="flex flex-col justify-center items-center gap-8 text-center">
                <h1>
                    {{ __('Сервис недоступен') }}</h1>

                <h5 class="text-slate-400 font-normal">
                    {{ __('Мы проводим профилактические работы - обновляем сервис, чтобы он работал быстрее и лучше. Приносим извинения за доставленные (причиненные) неудобства.') }}</h5>
            </section>
        </div>
    </main>
@endsection
