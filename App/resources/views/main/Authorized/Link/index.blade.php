@extends('layouts.authorized')

@section('title', __('Короткие ссылки'))
@section('description', __(''))

@section('content')
    <div class="mb-8">
        <h1 class="h3">{{ __('Короткие ссылки') }}</h1>
    </div>

    <div class="mb-8">
        <div class="grid grid-cols-3 gap-8">
            <div class="card p-6">
                <div class="flex items-center gap-6">
                    <div class="w-[52px] h-[52px] flex justify-center items-center text-center rounded-[10rem] bg-indigo-100 text-[15.75px] text-indigo-600">
                        <i class="fa-solid fa-link fa-fw fa-sm"></i>
                    </div>

                    <div class="flex flex-col gap-1">
                        <h5 class="">
                            {{ $collection->sum('limit_per_day') - $collection->sum('for_the_current_day') }}
                        </h5>
                        <p class="text-slate-500">{{ __('Доступных ссылок') }}</p>
                    </div>
                </div>
            </div>

            <div class="card p-6">
                <div class="flex items-center gap-6">
                    <div class="w-[52px] h-[52px] flex justify-center items-center text-center rounded-[10rem] bg-indigo-100 text-[15.75px] text-indigo-600">
                        <i class="fa-solid fa-dollar-sign fa-fw fa-sm"></i>
                    </div>

                    <div class="flex flex-col gap-1">
                        <h5 class="">
                            <x-tether :value="$collection->sum('tether') * $collection->sum('limit_per_day')"></x-tether>
                        </h5>
                        <p class="text-slate-500">{{ __('Заработок') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('notification::error'))
        <div class="mb-8">
            <div class="font-medium text-red-600">
                {{ session('notification::error') }}
            </div>
        </div>
    @endif

    @if(session('notification::success'))
        <div class="mb-8">
            <div class="font-medium text-green-600">
                {{ session('notification::success') }}
            </div>
        </div>
    @endif

    <div class="mb-0">
        <div class="grid grid-cols-3 gap-8">
            @foreach ($collection as $item)
                <div class="card p-6">
                    <div class="flex justify-between items-center">
                        <div>{{ $item->name }} - <x-tether :value="$item->tether"></x-tether></div>
                        <div>{{ $item->for_the_current_day }} / {{ $item->limit_per_day }}</div>
                    </div>

                    @if ($item->limit_per_day > $item->for_the_current_day)
                        <div class="mt-3">
                            <div class="flex justify-end items-center">
                                <x-link :href="route('link.visit', $item->id)">{{ __('Перейти к просмотру') }}</x-link>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
