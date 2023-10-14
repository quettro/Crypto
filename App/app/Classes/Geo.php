<?php

namespace App\Classes;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class Geo
{
    /**
     * @param $ip
     * @return array|mixed
     * @throws RequestException|Throwable
     */
    public static function info($ip): mixed
    {
        try {
            return Http::connectTimeout(10)->timeout(10)->get('http' . '://www.geoplugin.net/json.gp', [
                'ip' => $ip
            ])
                ->throw()->json();
        }
        catch (Throwable $exception) {
            Log::channel('guzzleHttp-error')->error('[ GeoPlugin ]:');
            Log::channel('guzzleHttp-error')->error('[ GeoPlugin ] - Payload:', ['ip' => $ip]);
            Log::channel('guzzleHttp-error')->error($exception);

            throw $exception;
        }
    }
}
