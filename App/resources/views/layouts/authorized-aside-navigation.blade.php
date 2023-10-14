<div class="px-8">
    <nav class="flex flex-col gap-2">
        <a href="{{ route('dashboard') }}" @class(['flex items-center gap-5 py-[1.1rem] px-5 rounded-lg hover:bg-indigo-50 hover:text-indigo-600', '!bg-indigo-600 !text-indigo-50' => request()->routeIs('dashboard')])>
            <i class="fa-solid fa-layer-group fa-fw text-sm"></i> {{ __('Дашборд') }}</a>

        <a href="{{ route('referral.index') }}" @class(['flex items-center gap-5 py-[1.1rem] px-5 rounded-lg hover:bg-indigo-50 hover:text-indigo-600', '!bg-indigo-600 !text-indigo-50' => request()->routeIs('referral.*')])>
            <i class="fa-solid fa-user-group fa-fw text-sm"></i> {{ __('Реферальная программа') }}</a>

        <a href="{{ route('freebie.index') }}" @class(['flex items-center gap-5 py-[1.1rem] px-5 rounded-lg hover:bg-indigo-50 hover:text-indigo-600', '!bg-indigo-600 !text-indigo-50' => request()->routeIs('freebie.*')])>
            <i class="fa-solid fa-faucet fa-fw text-sm"></i> {{ __('Кран') }}</a>

        <a href="{{ route('link.index') }}" @class(['flex items-center gap-5 py-[1.1rem] px-5 rounded-lg hover:bg-indigo-50 hover:text-indigo-600', '!bg-indigo-600 !text-indigo-50' => request()->routeIs('link.*')])>
            <i class="fa-solid fa-link fa-fw text-sm"></i> {{ __('Короткие ссылки') }}</a>

        <a href="{{ route('achievement.index') }}" @class(['flex items-center gap-5 py-[1.1rem] px-5 rounded-lg hover:bg-indigo-50 hover:text-indigo-600', '!bg-indigo-600 !text-indigo-50' => request()->routeIs('achievement.*')])>
            <i class="fa-solid fa-trophy fa-fw text-sm"></i> {{ __('Достижения') }}</a>

        <a href="{{ route('support.index') }}" @class(['flex items-center gap-5 py-[1.1rem] px-5 rounded-lg hover:bg-indigo-50 hover:text-indigo-600', '!bg-indigo-600 !text-indigo-50' => request()->routeIs('support.*')])>
            <i class="fa-solid fa-circle-question fa-fw text-sm"></i> {{ __('Справочный центр') }}</a>
    </nav>
</div>
