@extends('layouts.authorized')

@section('title', __('Справочный центр'))
@section('description', __(''))

@section('content')
    <div class="mb-8">
        <h1 class="h3">{{ __('Справочный центр') }}</h1>
    </div>

    <div class="mb-8">
        @if($collection->count())
            <div class="grid grid-cols-2 gap-6">
                @foreach($collection as $object)
                    <div>
                        <div class="card">
                            <button type="button" class="hs-collapse-toggle w-[100%] flex justify-between items-center p-5 font-medium" id="hs-faq-collapse-{{ $object->id }}" data-hs-collapse="#hs-faq-collapse-{{ $object->id }}-heading">
                                {{ $object->q }}

                                <i class="fa-solid fa-chevron-down fa-fw fa-sm hs-collapse-open:rotate-180"></i>
                            </button>

                            <div id="hs-faq-collapse-{{ $object->id }}-heading" class="hs-collapse hidden overflow-hidden transition-[height] duration-300" aria-labelledby="hs-faq-collapse-{{ $object->id }}">
                                <div class="p-5">
                                    <p class="text-slate-500">
                                        {{ $object->a }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="mb-0">
        <div class="card p-8">
            <div class="mb-8 flex items-center gap-4">
                <div class="w-[36px] h-[36px] flex justify-center items-center rounded-lg bg-indigo-50 text-indigo-600 border border-indigo-100">
                    <i class="fa-solid fa-circle-question fa-fw fa-sm"></i>
                </div>
                <div class="h5 !font-semibold">{{ __('Обратная связь') }}</div>
            </div>

            <div class="mb-0">
                <div class="max-w-xl">
                    <x-form :action="route('support.store')">
                        <x-form-group>
                            <x-label for="topic">{{ __('Тема') }}</x-label>
                            <x-select id="topic" name="topic" :option="\App\Enums\Feedback\TopicEnum::asSelectArray()" :o_selected="[old('topic')]" :invalid="$errors->has('topic')" required=""></x-select>
                            <x-invalid-feedback :messages="$errors->get('topic')"></x-invalid-feedback>
                        </x-form-group>

                        <x-form-group>
                            <x-label for="message">{{ __('Сообщение') }}</x-label>
                            <x-textarea id="message" name="message" :invalid="$errors->has('message')" required=""></x-textarea>
                            <x-invalid-feedback :messages="$errors->get('message')"></x-invalid-feedback>
                        </x-form-group>

                        @if($message = session('support.success'))
                            <x-form-group>
                                <div class="font-medium text-green-600">
                                    {{ $message }}
                                </div>
                            </x-form-group>
                        @endif

                        <x-button-primary>{{ __('Отправить') }}</x-button-primary>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
@endsection
