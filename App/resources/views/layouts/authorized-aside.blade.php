<x-aside>
    <x-slot name="h">
        @include('layouts.authorized-aside-logotype')
    </x-slot>

    <x-slot name="c">
        @include('layouts.authorized-aside-navigation')
    </x-slot>

    <x-slot name="f">
        <x-copyright></x-copyright>
    </x-slot>
</x-aside>
