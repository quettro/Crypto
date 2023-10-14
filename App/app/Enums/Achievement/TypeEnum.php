<?php declare(strict_types=1);

namespace App\Enums\Achievement;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class TypeEnum extends Enum implements LocalizedEnum
{
    const F = 0;

    const L = 1;
}
