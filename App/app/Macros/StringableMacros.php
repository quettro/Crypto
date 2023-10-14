<?php

namespace App\Macros;

use Closure;
use Illuminate\Support\Stringable;

class StringableMacros
{
    /**
     * @return Closure
     */
    public function toTether(): Closure
    {
        return function ()
        {
            /* @var $this Stringable */

            return str(number_format((string) $this, 8, '.', ','));
        };
    }
}
