@extends('layouts.superuser')

@section('title', __('Ip'))
@section('description', __(''))

@section('content')
    <div class="mb-8">
        <h1 class="h3">{{ __('Ip') }}</h1>
    </div>

    <div class="mb-8">
        <div class="flex items-center gap-2">
            <x-a-button-primary :href="route('superuser.ip.create')">{{ __('Новая запись') }}</x-a-button-primary>
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
                            <th class="table__th">{{ __('Ip') }}</th>
                            <th class="table__th">{{ __('Город') }}</th>
                            <th class="table__th">{{ __('Регион') }}</th>
                            <th class="table__th">{{ __('Страна') }}</th>
                            <th class="table__th">{{ __('Континент') }}</th>
                            <th class="table__th">{{ __('Часовой пояс') }}</th>
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
                                    <td class="table__td"><x-link :href="route('superuser.ip.show', $object->id)">{{ $object->id }}</x-link></td>
                                    <td class="table__td">{{ $object->ip }}</td>
                                    <td class="table__td">{{ $object->city }}</td>
                                    <td class="table__td">{{ $object->region_name }}</td>
                                    <td class="table__td">{{ $object->country_name }}</td>
                                    <td class="table__td">{{ $object->continent_name }}</td>
                                    <td class="table__td">{{ $object->timezone }}</td>
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
