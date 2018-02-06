<?php

namespace TXIoTCloud\Http;

use TXIoTCloud\Exception\ClientException;
use TXIoTCloud\Services\ResponseHandler;

/**
 * Class HttpClient ： http客户端
 * @package IoTCloud\Http
 */
class HttpClient
{

    /**
     * HTTP 连接超时，单位：秒
     */
    private static $connectTimeout = 10;

    /**
     * HTTP 读超时，单位：秒
     */
    private static $readTimeout = 15;

    /**
     * 是否开启Https
     */
    private static $isEnableHttps = true;

    /**
     * 代理服务器
     */
    private static $proxyServer = "";

    /**
     * 代理端口
     */
    private static $proxyPort = "";

    /**
     * 设置代理
     * @param $proxyServer 代理服务器
     * @param $proxyPort   代理端口
     */
    public static function setProxy($proxyServer, $proxyPort)
    {
        self::$proxyServer = $proxyServer;
        self::$proxyPort = $proxyPort;
    }

    /**
     * 发送请求
     * @param $action
     * @param $method
     * @param $parameters
     * @return \IoTCloud\Response\CreateDeviceResponse|\IoTCloud\Response\CreateProductResponse|void
     * @throws ClientException
     */
    public static function sendRequest($action, $method, $parameters)
    {
        $url = "https://" . self::packUrl($method, $parameters);
        $curl = self::initCurl($url, $method, $parameters);

        $body = curl_exec($curl);
        $errno = curl_errno($curl);
        if ($errno) {
            throw new ClientException(curl_strerror($errno), $errno);
        }
        curl_close($curl);
        return ResponseHandler::parseResponse($action, $body);
    }

    private static function packUrl($method, $parameters)
    {
        switch ($method) {
            case GET:
                return IoTCloudURL . $parameters;

            case POST:
                return IoTCloudURL;

            default:
                return IoTCloudURL;
        }
    }

    /**
     * 初始化curl
     * @param $url
     * @param $method
     * @param $parameters
     * @return curl
     */
    private static function initCurl($url, $method, $parameters)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_TIMEOUT, self::$readTimeout);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, self::$connectTimeout);

        if ($method == POST) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $parameters);
        }

        if (!empty(self::$proxyServer) && !empty(self::$proxyPort)) {
            curl_setopt($curl, CURLOPT_PROXYAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_PROXY, self::$proxyServer);
            curl_setopt($curl, CURLOPT_PROXYPORT, self::$proxyPort);
            curl_setopt($curl, CURLOPT_PROXYTYPE, CURLPROTO_HTTP);
        }

        if (self::$isEnableHttps) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }

        return $curl;
    }
}
