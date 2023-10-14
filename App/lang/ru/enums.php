<?php declare(strict_types=1);

return [
    \App\Enums\Link\StatusEnum::class => [
        \App\Enums\Link\StatusEnum::N => 'Выключен',
        \App\Enums\Link\StatusEnum::Y => 'Включен',
    ],

    \App\Enums\User\StatusEnum::class => [
        \App\Enums\User\StatusEnum::BANNED => 'Заблокирован',
        \App\Enums\User\StatusEnum::ACTIVE => 'Активен',
    ],

    \App\Enums\User\SuperuserEnum::class => [
        \App\Enums\User\SuperuserEnum::N => 'N',
        \App\Enums\User\SuperuserEnum::Y => 'Y',
    ],

    \App\Enums\LinkPtc\StatusEnum::class => [
        \App\Enums\LinkPtc\StatusEnum::N => 'Не использован',
        \App\Enums\LinkPtc\StatusEnum::Y => 'Использован',
    ],

    \App\Enums\Feedback\TopicEnum::class => [
        \App\Enums\Feedback\TopicEnum::OTHER => 'Другое',
        \App\Enums\Feedback\TopicEnum::AN_ERROR_HAS_OCCURRED => 'Произошла ошибка',
    ],

    \App\Enums\Achievement\TypeEnum::class => [
        \App\Enums\Achievement\TypeEnum::F => 'Кран',
        \App\Enums\Achievement\TypeEnum::L => 'Короткие ссылки',
    ],

    \App\Enums\Achievement\StatusEnum::class => [
        \App\Enums\Achievement\StatusEnum::N => 'Выключен',
        \App\Enums\Achievement\StatusEnum::Y => 'Включен',
    ],

    \App\Enums\Authorization\CodeEnum::class => [
        \App\Enums\Authorization\CodeEnum::_200 => '200 OK',
        \App\Enums\Authorization\CodeEnum::_400 => '400 Bad Request',
    ],

    \App\Enums\Transaction\TypeEnum::class => [
        \App\Enums\Transaction\TypeEnum::SUB => 'Списание',
        \App\Enums\Transaction\TypeEnum::ADD => 'Пополнение',
    ],

    \App\Enums\Transaction\SourceEnum::class => [
        \App\Enums\Transaction\SourceEnum::A => 'Достижения',
        \App\Enums\Transaction\SourceEnum::F => 'Кран',
        \App\Enums\Transaction\SourceEnum::L => 'Короткие ссылки',
    ],
];
