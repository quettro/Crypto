<?php declare(strict_types=1);

namespace App\Enums\Feedback;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class TopicEnum extends Enum implements LocalizedEnum
{
    const OTHER = 0;

    const AN_ERROR_HAS_OCCURRED = 1;
}
