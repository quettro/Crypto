<?php

namespace App\Observers;

use App\Enums\LinkPtc\StatusEnum;
use App\Models\LinkPtc;
use Illuminate\Support\Str;

class LinkPtcObserver
{
    /**
     * @param LinkPtc $linkPtc
     * @return void
     */
    public function creating(LinkPtc $linkPtc): void
    {
        #
        $linkPtc->uniqid = $linkPtc->uniqid !== null ? $linkPtc->uniqid : Str::random(128);

        #
        $linkPtc->status = $linkPtc->status !== null ? $linkPtc->status : StatusEnum::N;
    }
}
