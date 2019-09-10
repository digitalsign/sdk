<?php

namespace DigitalSign\Sdk;

/**
 * 签名部分
 *
 * @property string $accessKeyId
 * @property string $accessKeySecret
 */
trait SignTrait
{
    /**
     * 签名方法
     *
     * @param string $resource
     * @param array $parameters
     * @return array 带签名的参数
     *
     * @link https://www.digital-sign.com.cn/api/signature-introduce
     */
    public function sign($resource, $parameters)
    {
        $defaultTimeZone = date_default_timezone_get();
        if (!$defaultTimeZone) {
            $defaultTimeZone = 'UTC';
        }

        date_default_timezone_set('PRC');

        $parameters['accessKeyId'] = $this->accessKeyId;
        $parameters['nonce'] = uniqid();
        $parameters['timestamp'] = date('Y-m-d\TH:i:s\Z');

        ksort($parameters);
        date_default_timezone_set($defaultTimeZone);

        $parameters['sign'] = base64_encode(hash_hmac('sha256', $resource . '?' . http_build_query($parameters), $this->accessKeySecret, true));
        return $parameters;
    }
}
