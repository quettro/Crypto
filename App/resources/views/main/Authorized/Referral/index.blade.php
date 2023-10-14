@extends('layouts.authorized')

@section('title', __('Реферальная программа'))
@section('description', __(''))

@section('content')
    <div class="mb-8">
        <h1 class="h3">{{ __('Реферальная программа') }}</h1>
    </div>

    <div class="mb-8">
        <div class="grid grid-cols-3 gap-8">
            <div class="card p-6">
                <div class="flex items-center gap-6">
                    <div class="w-[52px] h-[52px] flex justify-center items-center text-center rounded-[10rem] bg-indigo-100 text-[15.75px] text-indigo-600">
                        <i class="fa-solid fa-user-group fa-fw fa-sm"></i>
                    </div>

                    <div class="flex flex-col gap-1">
                        <h5 class="">
                            {{ Auth::user()->referralHasMany()->count() }}
                        </h5>
                        <p class="text-slate-500">{{ __('Рефералов') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-8">
        <div class="card p-8">
            <div class="max-w-xl">
                <div class="mb-6">
                    <div class="flex flex-col gap-3">
                        <h5>{{ __('Реферальная ссылка') }}</h5>
                        <h6 class="font-normal text-slate-500">{{ __('За каждый вывод средств, сделанный вашими рефералами, Вы будете получать :commission% от суммы вывода. Это прекрасная возможность заработать дополнительные деньги, не прикладывая при этом никаких усилий.', ['commission' => setting()->referral_program_commission_percentage]) }}</h6>
                    </div>
                </div>
                <div class="input">{{ route('welcome', [setting()->referral_program_parameter => Auth::user()->name]) }}</div>
            </div>
        </div>
    </div>

    <div class="mb-0">
        <div class="mb-3">
            {{ $collection->links() }}
        </div>

        <div class="card overflow-hidden">
            <div class="table-responsive">
                <table class="table">
                    <thead class="table__thead">
                        <tr class="table__tr">
                            <th class="table__th">{{ __('Реферал') }}</th>
                            <th class="table__th">{{ __('Последняя активность') }}</th>
                            <th class="table__th">{{ __('Дата создания') }}</th>
                        </tr>
                    </thead>

                    <tbody class="table__tbody">
                        @if(!$collection->count())
                            <tr class="table__tr">
                                <td class="table__td !text-center" colspan="999">-</td>
                            </tr>
                        @else
                            @foreach($collection as $object)
                                <tr class="table__tr">
                                    <td class="table__td">{{ $object->referral?->name ?? '-' }}</td>
                                    <td class="table__td">{{ $object->referral?->last_activity_at ?? '-' }}</td>
                                    <td class="table__td">{{ $object->created_at }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
