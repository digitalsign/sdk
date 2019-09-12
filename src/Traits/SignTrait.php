<?php

namespace DigitalSign\Sdk\Traits;

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
     * @param string $resource 资源，一般是访问的路径文件
     * @param array $parameters 参数
     * @param string $accessKeyId
     * @param string $accessKeySecret
     * @return array 带签名的参数
     *
     * @link https://www.digital-sign.com.cn/api/signature-introduce
     */
    public function sign($resource, $parameters, $accessKeyId, $accessKeySecret)
    {
        $defaultTimeZone = date_default_timezone_get();
        if (!$defaultTimeZone) {
            $defaultTimeZone = 'UTC';
        }

        date_default_timezone_set('PRC');

        $parameters['accessKeyId'] = $accessKeyId;
        $parameters['nonce'] = uniqid();
        $parameters['timestamp'] = date('Y-m-d\TH:i:s\Z');

        ksort($parameters);
        date_default_timezone_set($defaultTimeZone);

        $parameters['sign'] = base64_encode(hash_hmac('sha256', $resource . '?' . http_build_query($parameters), $accessKeySecret, true));
        return $parameters;
    }
}
