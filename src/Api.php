<?php

namespace AtLab\Unisender;

use AtLab\Unisender\Exceptions\DataApiException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class Api
{
    /**
     * Init Unisender Call API client
     *
     */
    public function __construct()
    {
        $this->apiHost = $this->_getApiHost(config('unisender.host'), config('unisender.lang'));

        $this->client = new Client([
            'base_uri' => $this->apiHost,
            'defaults' => [
                'context' => stream_context_create([
                    'http' => [
                        'method' => 'POST',
                        'header' => 'Content-type: application/x-www-form-urlencoded',
                    ],
                    'ssl' => [
                        'crypto_method' => STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT,
                    ]
                ]),
            ],
        ]);
    }


    /**
     * @param $camelCaseMethod
     * @param array $params
     * @return mixed
     * @throws \Exception
     */
    public function __Call($camelCaseMethod, $params){
        return $this->_doRequest($camelCaseMethod,  $params[0]);
    }

    /**
     * @throws GuzzleException
     * @throws \Exception
     */
    private function _doRequest(string $method, array $params)
    {
        $method = preg_replace('~_~', '/', $method, 1);

        try {

            if (config('comagic.debug')) {
                Log::debug("Отправленные данные COMAGIC:" . PHP_EOL . json_encode($payload, JSON_PRETTY_PRINT));
            }
            $params = [...['api_key' => config('unisender.api_key'), 'format' => 'json', 'request_compression' => 'bzip2'],  ...$params];

            $response = $this->client->post($method, ['query' => $params]);

            if (config('comagic.debug')) {
                Log::debug("Полученный ответ COMAGIC:" . PHP_EOL . json_encode(json_decode($response->getBody()),JSON_PRETTY_PRINT));
            }

            $responseBody = json_decode($response->getBody());

            if (isset($responseBody->error)) {
                throw new DataApiException($responseBody);
            }

            return $responseBody->result;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    protected function _getApiHost($url, $lang): string
    {
        return sprintf($url, $lang);
    }

}
