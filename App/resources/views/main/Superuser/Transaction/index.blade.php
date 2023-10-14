@extends('layouts.superuser')

@section('title', __('Транзакции'))
@section('description', __(''))

@section('content')
    <div class="mb-8">
        <h1 class="h3">{{ __('Транзакции') }}</h1>
    </div>

    <div class="mb-8">
        <div class="flex items-center gap-2">
            <x-a-button-primary :href="route('superuser.transaction.create')">{{ __('Новая запись') }}</x-a-button-primary>
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
                            <th class="table__th">{{ __('Id') }}</th>
                            <th class="table__th">{{ __('Тип') }}</th>
                            <th class="table__th">{{ __('Источник') }}</th>
                            <th class="table__th">{{ __('Tether') }}</th>
                            <th class="table__th">{{ __('Пользователь') }}</th>
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
                                    <td class="table__td"><x-link :href="route('superuser.transaction.show', $object->id)">{{ $object->id }}</x-link></td>
                                    <td class="table__td">{{ $object->type->description }}</td>
                                    <td class="table__td">{{ $object->source->description }}</td>
                                    <td class="table__td">{{ $object->tether }}</td>
                                    <td class="table__td">{{ $object->user?->email }}</td>
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
