@extends('layouts.default')

@section('title', __('Главная страница'))
@section('description', __(''))

@section('content')
    <header class="py-8">
        <div class="w-[100%] max-w-screen-xl mx-auto px-[15px]">
            <div class="flex justify-between items-center">
                <a href="{{ route('welcome') }}" class="flex items-center gap-3">
                    <img src="{{ Vite::asset('resources/images/logotype.png') }}" class="object-contain object-center" width="38px" alt="{{ config('app.name') }}">

                    <span class="text-[19.93px] font-extrabold">{{ config('app.name') }}</span>
                </a>

                <div class="flex justify-end items-center gap-16">
                    <nav class="flex justify-end items-center gap-12">
                        <a href="#" class="text-slate-600 hover:text-slate-800">{{ __('Доказательство выплат') }}</a>
                        <a href="#" class="text-slate-600 hover:text-slate-800">{{ __('F.A.Q') }}</a>
                        <a href="#" class="text-slate-600 hover:text-slate-800">{{ __('Обратная связь') }}</a>
                    </nav>

                    <div class="flex justify-end items-center gap-4">
                        @auth
                            <a href="{{ route('dashboard') }}" class="button --primary shadow-lg shadow-indigo-300 !py-[11.06px] !px-[17.72px]">
                                {{ __('Личный кабинет') }}</a>
                        @else
                            <a href="{{ route('login') }}" class="button --outline-primary !py-[11.06px] !px-[17.72px]">
                                {{ __('Войти') }}</a>

                            <a href="{{ route('register') }}" class="button --primary shadow-lg shadow-indigo-300 !py-[11.06px] !px-[17.72px]">
                                {{ __('Зарегистрироваться') }}</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="py-24">
        <div class="w-[100%] max-w-screen-xl mx-auto px-[15px]">
            <div class="flex justify-between items-center flex-row-reverse gap-8">
                <div class="w-[100%] max-w-[55%]">
                    <div class="flex justify-end">
                        <img src="{{ Vite::asset('resources/images/welcome-1.png') }}" class="w-[98%] object-contain object-center" alt="I">
                    </div>
                </div>

                <div class="w-[100%] max-w-[45%]">
                    <div class="flex flex-col gap-12">
                        <h1 class="text-[45.46px] font-extrabold leading-[140%]">
                            Мультивалютная платформа <span class="text-indigo-600">{{ config('app.name') }}</span> для заработка денег</h1>

                        <p class="text-[17.72px] text-slate-600 leading-[140%] pr-[8rem]">
                            {{ __('Наша платформа предоставляет возможность получать вознаграждения как за просмотр рекламы, так и бесплатно!') }}</p>

                        <div class="flex items-center gap-2">
                            <a href="{{ route('register') }}" class="button --primary shadow-lg shadow-indigo-300 !text-[15.75px] !py-[14.00px] !px-[25.23px]">
                                {{ __('Зарегистрироваться') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24">
        <div class="w-[100%] max-w-screen-xl mx-auto px-[15px]">
            <h2 class="text-[31.93px] font-extrabold leading-[140%]">Всего 3 шага, чтобы начать <span class="text-indigo-600">зарабатывать</span></h2>

            <div class="mt-20">
                <div class="flex justify-between items-center gap-12">
                    <div class="w-[100%] max-w-[55%]">
                        <div class="flex">
                            <img src="{{ Vite::asset('resources/images/welcome-2.png') }}" class="w-[98%] object-contain object-center" alt="I">
                        </div>
                    </div>

                    <div class="w-[100%] max-w-[45%]">
                        <div class="group flex justify-start items-start gap-12 pb-20 last:pb-0 overflow-hidden">
                            <div class="relative after:content-[''] after:w-[1px] after:h-[100vh] after:block group-last:after:hidden after:bg-indigo-600 after:absolute after:top-[100%] w-[55px] h-[55px] flex justify-center items-center shrink-0 text-[22.43px] text-center text-indigo-600 font-extrabold bg-indigo-100 rounded-[10rem]">1</div>

                            <div class="pt-[11px]">
                                <div class="mb-6">
                                    <h3 class="text-[22.43px] font-extrabold leading-[140%]">{{ __('Регистрация') }}</h3>
                                </div>
                                <p class="text-[15.75px] text-slate-600">{{ __('Для создания учетной записи необходимо всего лишь заполнить три поля: адрес электронной почты, имя пользователя и пароль. Это займет не более трех минут.') }}</p>
                            </div>
                        </div>

                        <div class="group flex justify-start items-start gap-12 pb-20 last:pb-0 overflow-hidden">
                            <div class="relative after:content-[''] after:w-[1px] after:h-[100vh] after:block group-last:after:hidden after:bg-indigo-600 after:absolute after:top-[100%] w-[55px] h-[55px] flex justify-center items-center shrink-0 text-[22.43px] text-center text-indigo-600 font-extrabold bg-indigo-100 rounded-[10rem]">2</div>

                            <div class="pt-[11px]">
                                <div class="mb-6">
                                    <h3 class="text-[22.43px] font-extrabold leading-[140%]">{{ __('Подтверждение') }}</h3>
                                </div>
                                <p class="text-[15.75px] text-slate-600">{{ __('Как только Вы зарегистрируетесь, вам нужно будет подтвердить свой адрес электронной почты. Обычно на подтверждение уходит всего несколько секунд.') }}</p>
                            </div>
                        </div>

                        <div class="group flex justify-start items-start gap-12 pb-20 last:pb-0 overflow-hidden">
                            <div class="relative after:content-[''] after:w-[1px] after:h-[100vh] after:block group-last:after:hidden after:bg-indigo-600 after:absolute after:top-[100%] w-[55px] h-[55px] flex justify-center items-center shrink-0 text-[22.43px] text-center text-indigo-600 font-extrabold bg-indigo-100 rounded-[10rem]">3</div>

                            <div class="pt-[11px]">
                                <div class="mb-6">
                                    <h3 class="text-[22.43px] font-extrabold leading-[140%]">{{ __('Заработок') }}</h3>
                                </div>
                                <p class="text-[15.75px] text-slate-600">{{ __('Как только Вы завершите два предыдущих шага, Вы сможете начать зарабатывать деньги, размещая свою реферальную ссылку, просматривая рекламу и получая ежедневные бонусы.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24">
        <div class="w-[100%] max-w-screen-xl mx-auto px-[15px]">
            <h2 class="text-[31.93px] font-extrabold leading-[140%]">Наши <span class="text-indigo-600">преимущества</span></h2>

            <div class="mt-20">
                <div class="mb-4">
                    <div class="flex justify-between items-center flex-row-reverse gap-12">
                        <div class="w-[100%] max-w-[55%]">
                            <div class="flex justify-end">
                                <img src="{{ Vite::asset('resources/images/welcome-3.png') }}" class="w-[94%] object-contain object-center" alt="I">
                            </div>
                        </div>

                        <div class="w-[100%] max-w-[45%]">
                            <div class="flex flex-col gap-6">
                                <h3 class="text-[22.43px] font-extrabold leading-[140%]">Получайте <span class="text-indigo-600">{{ setting()->referral_program_commission_percentage }}%</span> от дохода рефералов</h3>
                                <p class="text-[15.75px] text-slate-600">{{ __('Если у вас есть знакомые, которые также заинтересованы в заработке, Вы можете пригласить их по своей реферальной ссылке и получить до :percent% от их заработка!', ['percent' => setting()->referral_program_commission_percentage]) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-0">
                    <div class="flex justify-between items-center gap-12">
                        <div class="max-w-[55%]">
                            <div class="flex">
                                <img src="{{ Vite::asset('resources/images/welcome-4.png') }}" class="w-[94%] object-contain object-center" alt="I">
                            </div>
                        </div>

                        <div class="max-w-[45%]">
                            <div class="flex flex-col gap-6">
                                <h3 class="text-[22.43px] font-extrabold leading-[140%]"><span class="text-indigo-600">Немедленное</span> снятие средств</h3>
                                <p class="text-[15.75px] text-slate-600">{{ __('Как только Вы наберете достаточную сумму для вывода, Вы можете запросить вывод средств и немедленно получить их. Вам не нужно ждать, чтобы получить свой заработок!') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24">
        <div class="w-[100%] max-w-screen-xl mx-auto px-[15px]">
            <h2 class="text-[31.93px] font-extrabold leading-[140%]">Как работает <span class="text-indigo-600">реферальная система</span></h2>

            <div class="mt-[8rem]">
                <div class="grid grid-cols-3">
                    <div class="relative">
                        <div class="absolute top-0 left-0 z-[-1] text-[131.23px] text-indigo-100 font-extrabold leading-[0]">1</div>

                        <div class="pt-2.5 pl-16">
                            <div class="mb-6">
                                <h3 class="text-[22.43px] font-extrabold leading-[140%]">{{ __('Копируйте ссылку') }}</h3>
                            </div>
                            <p class="text-[15.75px] text-slate-600">{{ __('Реферальную ссылку можно найти в личном кабинете - :project, в разделе "Реферальная программа".', ['project' => config('app.name')]) }}</p>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="absolute top-0 left-0 z-[-1] text-[131.23px] text-indigo-100 font-extrabold leading-[0]">2</div>

                        <div class="pt-2.5 pl-16">
                            <div class="mb-6">
                                <h3 class="text-[22.43px] font-extrabold leading-[140%]">{{ __('Приводите рефералов') }}</h3>
                            </div>
                            <p class="text-[15.75px] text-slate-600">{{ __('Делитесь ссылкой через свой блог, социальные сети и мессенджеры, размещайте её на своём сайте, в постах или под видео, а также делитесь ей с друзьями или коллегами.') }}</p>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="absolute top-0 left-0 z-[-1] text-[131.23px] text-indigo-100 font-extrabold leading-[0]">3</div>

                        <div class="pt-2.5 pl-16">
                            <div class="mb-6">
                                <h3 class="text-[22.43px] font-extrabold leading-[140%]">{{ __('Получайте доход') }}</h3>
                            </div>
                            <p class="text-[15.75px] text-slate-600">{{ __('Вы будете получать :percent% от дохода каждого, кто зарегистрируется по вашей реферальной ссылке. Заработанные средства будут доступны для вывода без задержек.', ['percent' => setting()->referral_program_commission_percentage]) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="flex flex-col-reverse overflow-hidden">
        <img src="{{ Vite::asset('resources/images/welcome-5.png') }}" class="relative z-[-1] w-[300%] max-w-[none] mt-[calc((((300%_-_100%)_/_2)_/_2)_*_-1)] ml-[calc(((300%_-_100%)_/_2)_*_-1)] object-contain object-center" alt="I">

        <div class="pt-24 pb-14 bg-indigo-50">
            <div class="w-[100%] max-w-screen-xl mx-auto px-[15px]">
                <div class="flex justify-between gap-8">
                    <div class="w-[100%] max-w-[40%]">
                        <div class="pr-12">
                            <div class="mb-6">
                                <h2 class="text-[31.93px] font-extrabold leading-[140%]">{{ __('Часто задаваемые вопросы') }}</h2>
                            </div>
                            <p class="text-[15.75px] text-slate-600">{{ __('У вас есть вопрос, на который нет ответа? Вы можете связаться с нами по адресу - :contact', ['contact' => setting()->contact]) }}</p>
                        </div>
                    </div>

                    <div class="w-[100%] max-w-[60%]">
                        <div class="flex flex-col gap-6">
                            <div class="bg-indigo-100 border border-indigo-200 rounded-lg">
                                <button type="button" class="hs-collapse-toggle w-[100%] flex justify-between items-center p-4 text-[15.75px]" id="hs-faq-collapse-0" data-hs-collapse="#hs-faq-collapse-0-heading">
                                    <span class="flex items-center gap-5">
                                        <span class="w-[38px] h-[38px] flex justify-center items-center shrink-0 text-indigo-50 text-center bg-indigo-600 rounded-[10rem]"><i class="fa-solid fa-question fa-fw pt-[1px] pl-[6.8%]"></i></span>
                                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, eum.</span>
                                    </span>
                                    <i class="fa-solid fa-chevron-down fa-fw hs-collapse-open:rotate-180 text-indigo-600"></i>
                                </button>

                                <div id="hs-faq-collapse-0-heading" class="hs-collapse hidden overflow-hidden transition-[height] duration-300" aria-labelledby="hs-faq-collapse-0">
                                    <div class="p-5 pt-3">
                                        <p class="text-[15.75px] text-slate-600">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consequatur dolor itaque optio praesentium provident quis quo recusandae repellendus tenetur.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-indigo-100 border border-indigo-200 rounded-lg">
                                <button type="button" class="hs-collapse-toggle w-[100%] flex justify-between items-center p-4 text-[15.75px]" id="hs-faq-collapse-0" data-hs-collapse="#hs-faq-collapse-0-heading">
                                    <span class="flex items-center gap-5">
                                        <span class="w-[38px] h-[38px] flex justify-center items-center shrink-0 text-indigo-50 text-center bg-indigo-600 rounded-[10rem]"><i class="fa-solid fa-question fa-fw pt-[1px] pl-[6.8%]"></i></span>
                                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, eum.</span>
                                    </span>
                                    <i class="fa-solid fa-chevron-down fa-fw hs-collapse-open:rotate-180 text-indigo-600"></i>
                                </button>

                                <div id="hs-faq-collapse-0-heading" class="hs-collapse hidden overflow-hidden transition-[height] duration-300" aria-labelledby="hs-faq-collapse-0">
                                    <div class="p-5 pt-3">
                                        <p class="text-[15.75px] text-slate-600">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consequatur dolor itaque optio praesentium provident quis quo recusandae repellendus tenetur.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-indigo-100 border border-indigo-200 rounded-lg">
                                <button type="button" class="hs-collapse-toggle w-[100%] flex justify-between items-center p-4 text-[15.75px]" id="hs-faq-collapse-0" data-hs-collapse="#hs-faq-collapse-0-heading">
                                    <span class="flex items-center gap-5">
                                        <span class="w-[38px] h-[38px] flex justify-center items-center shrink-0 text-indigo-50 text-center bg-indigo-600 rounded-[10rem]"><i class="fa-solid fa-question fa-fw pt-[1px] pl-[6.8%]"></i></span>
                                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, eum.</span>
                                    </span>
                                    <i class="fa-solid fa-chevron-down fa-fw hs-collapse-open:rotate-180 text-indigo-600"></i>
                                </button>

                                <div id="hs-faq-collapse-0-heading" class="hs-collapse hidden overflow-hidden transition-[height] duration-300" aria-labelledby="hs-faq-collapse-0">
                                    <div class="p-5 pt-3">
                                        <p class="text-[15.75px] text-slate-600">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consequatur dolor itaque optio praesentium provident quis quo recusandae repellendus tenetur.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-indigo-100 border border-indigo-200 rounded-lg">
                                <button type="button" class="hs-collapse-toggle w-[100%] flex justify-between items-center p-4 text-[15.75px]" id="hs-faq-collapse-0" data-hs-collapse="#hs-faq-collapse-0-heading">
                                    <span class="flex items-center gap-5">
                                        <span class="w-[38px] h-[38px] flex justify-center items-center shrink-0 text-indigo-50 text-center bg-indigo-600 rounded-[10rem]"><i class="fa-solid fa-question fa-fw pt-[1px] pl-[6.8%]"></i></span>
                                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, eum.</span>
                                    </span>
                                    <i class="fa-solid fa-chevron-down fa-fw hs-collapse-open:rotate-180 text-indigo-600"></i>
                                </button>

                                <div id="hs-faq-collapse-0-heading" class="hs-collapse hidden overflow-hidden transition-[height] duration-300" aria-labelledby="hs-faq-collapse-0">
                                    <div class="p-5 pt-3">
                                        <p class="text-[15.75px] text-slate-600">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consequatur dolor itaque optio praesentium provident quis quo recusandae repellendus tenetur.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-indigo-100 border border-indigo-200 rounded-lg">
                                <button type="button" class="hs-collapse-toggle w-[100%] flex justify-between items-center p-4 text-[15.75px]" id="hs-faq-collapse-0" data-hs-collapse="#hs-faq-collapse-0-heading">
                                    <span class="flex items-center gap-5">
                                        <span class="w-[38px] h-[38px] flex justify-center items-center shrink-0 text-indigo-50 text-center bg-indigo-600 rounded-[10rem]"><i class="fa-solid fa-question fa-fw pt-[1px] pl-[6.8%]"></i></span>
                                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, eum.</span>
                                    </span>
                                    <i class="fa-solid fa-chevron-down fa-fw hs-collapse-open:rotate-180 text-indigo-600"></i>
                                </button>

                                <div id="hs-faq-collapse-0-heading" class="hs-collapse hidden overflow-hidden transition-[height] duration-300" aria-labelledby="hs-faq-collapse-0">
                                    <div class="p-5 pt-3">
                                        <p class="text-[15.75px] text-slate-600">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consequatur dolor itaque optio praesentium provident quis quo recusandae repellendus tenetur.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-indigo-100 border border-indigo-200 rounded-lg">
                                <button type="button" class="hs-collapse-toggle w-[100%] flex justify-between items-center p-4 text-[15.75px]" id="hs-faq-collapse-0" data-hs-collapse="#hs-faq-collapse-0-heading">
                                    <span class="flex items-center gap-5">
                                        <span class="w-[38px] h-[38px] flex justify-center items-center shrink-0 text-indigo-50 text-center bg-indigo-600 rounded-[10rem]"><i class="fa-solid fa-question fa-fw pt-[1px] pl-[6.8%]"></i></span>
                                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, eum.</span>
                                    </span>
                                    <i class="fa-solid fa-chevron-down fa-fw hs-collapse-open:rotate-180 text-indigo-600"></i>
                                </button>

                                <div id="hs-faq-collapse-0-heading" class="hs-collapse hidden overflow-hidden transition-[height] duration-300" aria-labelledby="hs-faq-collapse-0">
                                    <div class="p-5 pt-3">
                                        <p class="text-[15.75px] text-slate-600">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consequatur dolor itaque optio praesentium provident quis quo recusandae repellendus tenetur.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-indigo-100 border border-indigo-200 rounded-lg">
                                <button type="button" class="hs-collapse-toggle w-[100%] flex justify-between items-center p-4 text-[15.75px]" id="hs-faq-collapse-0" data-hs-collapse="#hs-faq-collapse-0-heading">
                                    <span class="flex items-center gap-5">
                                        <span class="w-[38px] h-[38px] flex justify-center items-center shrink-0 text-indigo-50 text-center bg-indigo-600 rounded-[10rem]"><i class="fa-solid fa-question fa-fw pt-[1px] pl-[6.8%]"></i></span>
                                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, eum.</span>
                                    </span>
                                    <i class="fa-solid fa-chevron-down fa-fw hs-collapse-open:rotate-180 text-indigo-600"></i>
                                </button>

                                <div id="hs-faq-collapse-0-heading" class="hs-collapse hidden overflow-hidden transition-[height] duration-300" aria-labelledby="hs-faq-collapse-0">
                                    <div class="p-5 pt-3">
                                        <p class="text-[15.75px] text-slate-600">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consequatur dolor itaque optio praesentium provident quis quo recusandae repellendus tenetur.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24">
        <div class="w-[100%] max-w-screen-xl mx-auto px-[15px]">
            <div class="flex justify-between items-center gap-8">
                <div class="w-[100%] max-w-[55%]">
                    <img src="{{ Vite::asset('resources/images/welcome-6.png') }}" class="object-contain object-center" alt="I">
                </div>

                <div class="w-[100%] max-w-[45%]">
                    <div class="flex flex-col gap-12">
                        <h2 class="text-[31.93px] font-extrabold leading-[140%]">
                            Вы готовы начать зарабатывать с помощью платформы <span class="text-indigo-600">{{ config('app.name') }}</span>?</h2>

                        <p class="text-[15.75px] text-slate-600">
                            {{ __('Вы можете зарегистрировать свой аккаунт и начать зарабатывать уже сейчас - это абсолютно бесплатно!') }}</p>

                        <div class="flex items-center gap-2">
                            <a href="{{ route('register') }}" class="button --primary shadow-lg shadow-indigo-300 !py-[14.00px] !px-[25.23px]">
                                {{ __('Зарегистрироваться') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-16 bg-slate-800">
        <div class="w-[100%] max-w-screen-xl mx-auto px-[15px]">
            <div class="flex flex-col-reverse gap-16">
                <x-copyright class="!text-base !text-slate-500"></x-copyright>

                <div class="flex justify-between items-center flex-row-reverse">
                    <div class="flex items-center">
                        <a href="mailto:{{ setting()->contact }}" class="text-slate-50">{{ setting()->contact }}</a>
                    </div>

                    <nav class="flex justify-center items-center gap-8">
                        <a href="#" class="text-slate-50">{{ __('Доказательство выплат') }}</a>
                        <a href="#" class="text-slate-50">{{ __('F.A.Q') }}</a>
                        <a href="#" class="text-slate-50">{{ __('Обратная связь') }}</a>
                    </nav>

                    <div class="flex items-center">
                        <a href="{{ route('welcome') }}" class="flex items-center gap-3">
                            <img src="{{ Vite::asset('resources/images/logotype.png') }}" class="object-contain object-center" width="38px" alt="{{ config('app.name') }}">

                            <span class="text-[19.93px] text-slate-50 font-extrabold">{{ config('app.name') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
