@extends('layouts.superuser')

@section('title', __('Пользователи'))
@section('description', __(''))

@section('content')
    <div class="mb-8">
        <h1 class="h3">{{ __('Пользователи') }}</h1>
    </div>

    <div class="mb-8">
        <div class="flex items-center gap-2">
            <x-a-button-primary :href="route('superuser.user.create')">{{ __('Новая запись') }}</x-a-button-primary>
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
                            <th class="table__th">{{ __('Имя') }}</th>
                            <th class="table__th">{{ __('Адрес электронной почты') }}</th>
                            <th class="table__th">{{ __('Статус') }}</th>
                            <th class="table__th">{{ __('Баланс') }}</th>
                            <th class="table__th">{{ __('Referer') }}</th>
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
                                    <td class="table__td"><x-link :href="route('superuser.user.show', $object->id)">{{ $object->id }}</x-link></td>
                                    <td class="table__td">{{ $object->name }}</td>
                                    <td class="table__td">{{ $object->email }}</td>
                                    <td class="table__td">{{ $object->status->description }}</td>
                                    <td class="table__td">{{ $object->balance }}</td>
                                    <td class="table__td">{{ str($object->referer)->limit(32) }}</td>
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
