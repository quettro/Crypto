<?php

namespace App\Jobs;

use App\Classes\Geo;
use App\Models\Ip;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Throwable;

class UpdateTheIpAddressLocation implements ShouldQueue
{
    /**
     *
     */
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     *
     */
    public function __construct(private Ip $ip)
    {
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function handle(): void
    {
        $info = Geo::info($this->ip->ip);

        $this->ip->city = @$info['geoplugin_city'];
        $this->ip->region = @$info['geoplugin_region'];
        $this->ip->region_code = @$info['geoplugin_regionCode'];
        $this->ip->region_name = @$info['geoplugin_regionName'];
        $this->ip->country_code = @$info['geoplugin_countryCode'];
        $this->ip->country_name = @$info['geoplugin_countryName'];
        $this->ip->continent_code = @$info['geoplugin_continentCode'];
        $this->ip->continent_name = @$info['geoplugin_continentName'];
        $this->ip->timezone = @$info['geoplugin_timezone'];
        $this->ip->save();
    }
}
