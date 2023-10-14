<div class="flex justify-between items-center">
    <div class="flex items-center gap-8">
        <x-dropdown position="left">
            <x-slot name="trigger" class="flex items-center gap-2 h6 !font-semibold">
                {{ __('Панель администратора') }}
                <i class="fa-solid fa-chevron-down fa-fw fa-xs"></i>
            </x-slot>

            <x-slot name="content" class="w-[18rem]">
                <div class="py-2.5">
                    <x-dropdown-link :href="route('superuser.dashboard')" class="py-2.5">
                        <i class="fa-solid fa-layer-group fa-fw fa-sm mr-2"></i>
                        {{ __('Дашборд') }}
                    </x-dropdown-link>

                    <x-dropdown-link :href="route('superuser.user.index')" class="py-2.5">
                        <i class="fa-solid fa-user fa-fw fa-sm mr-2"></i>
                        {{ __('Пользователи') }}
                    </x-dropdown-link>

                    <x-dropdown-link :href="route('superuser.activity.index')" class="py-2.5">
                        <i class="fa-solid fa-clock-rotate-left fa-fw fa-sm mr-2"></i>
                        {{ __('Активность') }}
                    </x-dropdown-link>

                    <x-dropdown-link :href="route('superuser.transaction.index')" class="py-2.5">
                        <i class="fa-solid fa-arrow-right-arrow-left fa-fw fa-sm mr-2"></i>
                        {{ __('Транзакции') }}
                    </x-dropdown-link>

                    <x-dropdown-link :href="route('superuser.notification.index')" class="py-2.5">
                        <i class="fa-solid fa-bell fa-fw fa-sm mr-2"></i>
                        {{ __('Уведомления') }}
                    </x-dropdown-link>

                    <x-dropdown-link :href="route('superuser.authorization.index')" class="py-2.5">
                        <i class="fa-solid fa-right-to-bracket fa-fw fa-sm mr-2"></i>
                        {{ __('История авторизации') }}
                    </x-dropdown-link>

                    <x-dropdown-link :href="route('superuser.referral.index')" class="py-2.5">
                        <i class="fa-solid fa-user-group fa-fw fa-sm mr-2"></i>
                        {{ __('Рефералы') }}
                    </x-dropdown-link>

                    <x-dropdown-link :href="route('superuser.ip.index')" class="py-2.5">
                        <i class="fa-solid fa-location-dot fa-fw fa-sm mr-2"></i>
                        {{ __('Ip') }}
                    </x-dropdown-link>

                    <x-dropdown-link :href="route('superuser.user-agent.index')" class="py-2.5">
                        <i class="fa-solid fa-laptop fa-fw fa-sm mr-2"></i>
                        {{ __('User-Agent') }}
                    </x-dropdown-link>

                    <x-dropdown-link :href="route('superuser.faq.index')" class="py-2.5">
                        <i class="fa-solid fa-circle-question fa-fw fa-sm mr-2"></i>
                        {{ __('F.a.q') }}
                    </x-dropdown-link>

                    <x-dropdown-link :href="route('superuser.feedback.index')" class="py-2.5">
                        <i class="fa-solid fa-circle-info fa-fw fa-sm mr-2"></i>
                        {{ __('Обратная связь') }}
                    </x-dropdown-link>

                    <x-dropdown-link :href="route('superuser.link.index')" class="py-2.5">
                        <i class="fa-solid fa-link fa-fw fa-sm mr-2"></i>
                        {{ __('Короткие ссылки') }}
                    </x-dropdown-link>

                    <x-dropdown-link :href="route('superuser.link-ptc.index')" class="py-2.5">
                        <i class="fa-solid fa-link fa-fw fa-sm mr-2"></i>
                        {{ __('[ Ptc ] Короткие ссылки') }}
                    </x-dropdown-link>

                    <x-dropdown-link :href="route('superuser.achievement.index')" class="py-2.5">
                        <i class="fa-solid fa-trophy fa-fw fa-sm mr-2"></i>
                        {{ __('Достижения') }}
                    </x-dropdown-link>

                    <x-dropdown-link :href="route('superuser.user-achievement.index')" class="py-2.5">
                        <i class="fa-solid fa-trophy fa-fw fa-sm mr-2"></i>
                        {{ __('Достижения пользователей') }}
                    </x-dropdown-link>

                    <x-dropdown-link :href="route('superuser.setting.show')" class="py-2.5">
                        <i class="fa-solid fa-cog fa-fw fa-sm mr-2"></i>
                        {{ __('Настройки') }}
                    </x-dropdown-link>
                </div>
            </x-slot>
        </x-dropdown>
    </div>

    <div class="flex items-center gap-8">
        @include('layouts.common.content.navigation.notification')

        <x-dropdown>
            <x-slot name="trigger" class="flex items-center gap-2">
                {{ Auth::user()->email }} <i class="fa-solid fa-chevron-down fa-fw fa-xs"></i>
            </x-slot>

            <x-slot name="content">
                <div class="py-2.5">
                    <x-dropdown-link :href="route('dashboard')">
                        <i class="fa-solid fa-right-from-bracket fa-fw text-sm mr-2"></i>
                        {{ __('Вернуться') }}
                    </x-dropdown-link>

                    <x-form :action="route('logout')">
                        <x-dropdown-link :href="route('logout')" class="!text-red-500 hover:!bg-red-50 focus:!bg-red-100" onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fa-solid fa-right-from-bracket fa-fw text-sm mr-2"></i>
                            {{ __('Выйти') }}
                        </x-dropdown-link>
                    </x-form>
                </div>
            </x-slot>
        </x-dropdown>
    </div>
</div>
