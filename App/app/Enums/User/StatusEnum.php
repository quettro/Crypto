<?php declare(strict_types=1);

namespace App\Enums\User;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class StatusEnum extends Enum implements LocalizedEnum
{
    const BANNED = 0;

    const ACTIVE = 1;
}
