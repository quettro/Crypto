<?php declare(strict_types=1);

namespace App\Enums\User;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class SuperuserEnum extends Enum implements LocalizedEnum
{
    const N = 0;

    const Y = 1;
}
