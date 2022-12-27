<?php

namespace App\Http\Controllers;
use App\Services\NBPService;
use GuzzleHttp\Exception\GuzzleException;

class NBPController extends Controller
{

    /**
     * Health check function - sends GET request to NBP API and returns response / exceptions
     */
    public function healthCheck(): \Illuminate\Http\JsonResponse
    {
        try {
            $response = (new NBPService())->request('GET', 'exchangerates/tables/a/last/1');
            return response()->json(['status' => 'ok', 'data' => json_decode($response->getBody())]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        } catch (GuzzleException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function getCurrenciesFromApi(){
        try {
            $response = (new NBPService())->updateCurrencies();
            return $response;
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        } catch (GuzzleException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

}


