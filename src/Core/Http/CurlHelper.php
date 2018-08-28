<?php
/**
 * 简单包装curl
 * https://github.com/php-curl-class/php-curl-class,作者,zachborboa
 * @author jingyi.wang
 */

namespace Core\Http;


use Curl\Curl;

class CurlHelper {

    public static function send($method, $url, array $params=[], array $headers=[]) {
        switch ($method) {
            case "get":
                return self::sendGet($url, $params, $headers);
            case "post":
                return self::sendPost($url, $params, $headers);
            default:
                break;
        }
        return false;
    }


    public static function sendGet($url, array $params=[], array $headers=[]) {
        $curl = new Curl();
        $curl->setUrl($url);
        if ($headers && count($headers)>0) {
            $curl->setHeaders($headers);
        }
        return $curl->get($url, $params);
    }

    public static function sendPost($url, array $params, $headers=[]) {
        $curl = new Curl();
        $curl->setUrl($url);
        if ($headers && count($headers)>0) {
            $curl->setHeaders($headers);
        }
        return $curl->post($url, $params);
    }

}