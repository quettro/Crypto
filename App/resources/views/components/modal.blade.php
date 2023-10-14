@props(['name'])

<div
    x-data="{
        show: false,
    }"
    x-show="show"
    x-init="$watch('show', value => value ? document.body.classList.add('overflow-y-hidden') : document.body.classList.remove('overflow-y-hidden'))"
    x-on:close.stop="show = false"
    x-on:modal.window="$event.detail == '{{ $name }}' ? show = true : null"
    x-on:keydown.escape.window="show = false"
    x-on:keydown.tab.prevent="$event.shiftKey"
    class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
    style="display: none;">

    <div
        x-show="show"
        class="fixed inset-0 transform transition-all"
        @click.prevent.stop="show = false"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">

        <div
            class="absolute inset-0 bg-slate-500 opacity-75"></div>
    </div>

    <div
        class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-2xl sm:mx-auto"
        x-show="show"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">

        <div>
            {{ $slot }}</div>
    </div>
</div>
