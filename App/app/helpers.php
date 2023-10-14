<?php

/**
 * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|\App\Models\Setting|array|null
 */
function setting(): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|\App\Models\Setting|array|null
{
    return \App\Models\Setting::default();
}
