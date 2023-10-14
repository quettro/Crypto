<x-dropdown x-data="Notification">
    <x-slot name="trigger" x-bind:class="collection.length > 0 ? `after:absolute after:top-0 after:right-0 after:w-[5px] after:h-[5px] after:rounded-[10rem] after:bg-red-500` : ``">
        <i class="fa-solid fa-bell fa-fw"></i>
    </x-slot>

    <x-slot name="content" class="w-[32rem]">
        <div class="py-2.5">
            <div class="px-6">
                <div class="py-3">
                    <div class="flex justify-between items-center">
                        <div class="h5">{{ __('Уведомления') }}</div><button type="button" class="text-sm" x-bind="readAll">{{ __('Прочитать все') }}</button>
                    </div>
                </div>

                <template x-if="collection.length < 1">
                    <div class="py-3">
                        <div class="text-center">
                            {{ __('Нет уведомлений.') }}
                        </div>
                    </div>
                </template>

                <template x-if="collection.length > 0">
                    <div class="max-h-[50vh] overflow-y-auto flex flex-col gap-1">
                        <template x-for="notification in collection">
                            <div class="border-b border-slate-100 last:border-0 py-3">
                                <div class="font-semibold mb-1" x-text="notification.title"></div>
                                <div class="text-slate-500" x-text="notification.message"></div>
                            </div>
                        </template>
                    </div>
                </template>
            </div>
        </div>
    </x-slot>
</x-dropdown>
