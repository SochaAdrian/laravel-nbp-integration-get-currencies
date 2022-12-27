<?php

namespace App\Services;

use App\Models\Currency;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class NBPService
{

    /** @var string The base URL for API */
    public static $apiBase = 'http://api.nbp.pl/api/';

    /**
     * Sends a request to Stripe's API.
     *
     * @param string $method the HTTP method
     * @param string $path the path of the request
     *
     * @throws GuzzleException
     */
    public function request($method, $path): \Psr\Http\Message\ResponseInterface
    {
        $url = self::getApiUrl() . $path;
        $opts = [
            'method' => $method,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ]];

        return (new Client())->request($method, $url, $opts);
    }

    /**
     * @return string the API url used for requests
     */
    public static function getApiUrl()
    {
        return self::$apiBase;
    }

    public function updateCurrencies()
    {
        $response = $this->request('GET', 'exchangerates/tables/a/');
        $data = json_decode($response->getBody());
        $rates = $data[0]->rates;
        foreach ($rates as $rate) {
            $currency = Currency::where('currency_code', $rate->code)->first();
            if ($currency) {
                $currency->update([
                    'exchange_rate' => $rate->mid*100,
                ]);
            } else {
                Currency::create([
                    'name' => $rate->currency,
                    'exchange_rate' => $rate->mid*100,
                    'currency_code' => $rate->code,
                ]);
            }
        }

        return response()->json(['status' => 'Currencies updated']);
    }

}
