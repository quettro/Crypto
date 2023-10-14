<?php declare(strict_types=1);

namespace App\Enums\Transaction;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class SourceEnum extends Enum implements LocalizedEnum
{
    const A = 0;

    const F = 1;

    const L = 2;
}
