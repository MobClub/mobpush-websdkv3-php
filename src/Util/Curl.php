<?php

namespace MobTech\MobPush\Util;

use MobTech\MobPush\Config\MobPushConfig;

/**
 * Class Curl
 * @package MobPush
 */
class Curl
{
    /**
     * @param $url
     * @param $params
     * @return bool|false|string
     */
    public static function post($url, $params)
    {
        try {
            $resp = self::curlJson($params, MobPushConfig::baseUrl . $url);
        } catch (\Exception $exception) {
            $resp = json_encode([
                'code' => $exception->getCode(),
                'message' => $exception->getMessage()
            ]);
        }
        return $resp;
    }

    /**
     * @param $url
     * @param $params
     * @return bool|false|string
     */
    public static function getResult($url, $params)
    {
        try {
            $params['appkey'] = MobPushConfig::$appkey;
            $resp = self::curlJson($params, MobPushConfig::baseUrl . $url);
        } catch (\Exception $exception) {
            $resp = json_encode([
                'code' => $exception->getCode(),
                'message' => $exception->getMessage()
            ]);
        }
        return $resp;
    }

    /**
     * @param $params
     * @param $url
     * @param int $time
     * @return bool|string
     */
    public static function get($url, $params = [], $time = 30)
    {
        if (count($params) > 0) {
            $url .= "?" . http_build_query($params);
        }
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, MobPushConfig::baseUrl . $url);
        curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, $time);
        curl_setopt($curl, CURLOPT_HTTPHEADER, self::curlHeader(json_encode($params)));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    /**
     * CURL Json
     *
     * @param $params
     * @param $url
     * @param int $time
     * @return bool|string
     * @throws \Exception
     */
    private static function curlJson($params, $url, $time = 30)
    {
        $paramsStr = json_encode($params);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $paramsStr);
        curl_setopt($curl, CURLOPT_TIMEOUT, $time);
        curl_setopt($curl, CURLOPT_HTTPHEADER, self::curlHeader($paramsStr));
        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new \Exception(curl_error($curl), 0);
        } else {
            $httpStatusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if (200 !== $httpStatusCode) {
                throw new \Exception($response, $httpStatusCode);
            }
        }
        curl_close($curl);
        return $response;
    }

    private static function curlHeader($paramsStr)
    {
        return [
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen($paramsStr),
            'key: ' . MobPushConfig::$appkey,
            'sign: ' . md5($paramsStr . MobPushConfig::$appSecret),
        ];
    }
}
