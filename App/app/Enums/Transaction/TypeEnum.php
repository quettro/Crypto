<?php declare(strict_types=1);

namespace App\Enums\Transaction;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class TypeEnum extends Enum implements LocalizedEnum
{
    const SUB = 0;

    const ADD = 1;
}
