<div class="py-6 px-8">
    <div class="flex justify-between items-center">
        <div class="flex items-center gap-8">
            <div class="h5 !font-semibold">{{ __('Здравствуйте') }}, {{ Auth::user()->name }}!</div>
        </div>

        <div class="flex items-center gap-8">
            @include('layouts.common.content.navigation.notification')

            <x-dropdown>
                <x-slot name="trigger" class="flex items-center gap-2">
                    {{ Auth::user()->email }} <i class="fa-solid fa-chevron-down fa-fw fa-xs"></i>
                </x-slot>

                <x-slot name="content">
                    <div class="py-2.5">
                        <x-dropdown-link :href="route('settings.index')">
                            <i class="fa-solid fa-gear fa-fw text-sm mr-2"></i> {{ __('Настройки') }}
                        </x-dropdown-link>

                        @if(Auth::user()->superuser->is(\App\Enums\User\SuperuserEnum::Y))
                            <x-dropdown-link :href="route('superuser.dashboard')">
                                <i class="fa-solid fa-bomb fa-fw text-sm mr-2"></i> {{ __('Администратор') }}
                            </x-dropdown-link>
                        @endif

                        <x-form :action="route('logout')">
                            <x-dropdown-link :href="route('logout')" class="!text-red-500 hover:!bg-red-50 focus:!bg-red-100" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fa-solid fa-right-from-bracket fa-fw text-sm mr-2"></i> {{ __('Выйти') }}
                            </x-dropdown-link>
                        </x-form>
                    </div>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</div>
