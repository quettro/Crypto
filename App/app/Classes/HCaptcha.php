<?php

namespace App\Classes;

use Exception;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HCaptcha
{
    /**
     * @param mixed $_public
     * @param mixed $_secret
     */
    public function __construct(private mixed $_public, private mixed $_secret)
    {
    }

    /**
     * @param string $response
     * @return mixed
     * @throws RequestException
     */
    public function verify(string $response): mixed
    {
        $body = [];
        $body['response'] = $response;
        $body['remoteip'] = request()->ip;

        return $this->http('https://hcaptcha.com/siteverify', $body);
    }

    /**
     * @param string $route
     * @param array $body
     * @return mixed
     * @throws RequestException
     */
    public function http(string $route, array $body): mixed
    {
        $body['secret'] = $this->_secret;
        $body['sitekey'] = $this->_public;

        try {
            $response = Http::asForm()
                ->connectTimeout(10)->timeout(10)->post($route, $body)->throw()->json();
        }
        catch (Exception $exception) {
            Log::channel('guzzleHttp-error')->error('[ HCaptcha ]:');
            Log::channel('guzzleHttp-error')->error('[ HCaptcha ] - Payload:', $body);
            Log::channel('guzzleHttp-error')->error($exception);

            throw $exception;
        }

        return $response;
    }
}
