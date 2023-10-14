@extends('layouts.authorized')

@section('title', __('Достижения'))
@section('description', __(''))

@section('content')
    <div class="mb-8">
        <h1 class="h3">{{ __('Достижения') }}</h1>
    </div>

    <div class="mb-0">
        <div class="grid grid-cols-2 gap-8">
            @foreach ($collection as $item)
                @php
                    $progress = $item->progressInPercentage();
                @endphp

                <div class="card p-6">
                    <div class="flex justify-between items-center">
                        <div>{{ $item->achievement->description }}</div>
                        <div><x-tether :value="$item->achievement->tether"></x-tether></div>
                    </div>

                    <div class="mt-4">
                        <div class="flex flex-col gap-2">
                            <div class="flex justify-end items-center">
                                {{ $item->progress }} {{ __('из') }} {{ $item->achievement->purpose }}
                            </div>

                            <div class="">
                                <div class="relative h-[8px] rounded-lg bg-slate-300 overflow-hidden">
                                    <div class="w-[var(--w)] h-[100%] absolute top-0 left-0 bg-indigo-500" style="--w: {{ $progress }}%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
