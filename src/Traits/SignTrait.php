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
     * 遍历数组, 进行字符串化，并trim
     *
     * @param array $arr
     * @return array
     */
    private function everthingStringize($arr)
    {
        foreach ($arr as $key => $value) {
            if (is_numeric($value)) {
                $arr[$key] = (string) $value;
            } else if (is_array($value)) {
                $arr[$key] = $this->everthingStringize($value);
            } else if (is_string($value)) {
                $arr[$key] = trim($value);
            }
        }
        return $arr;
    }

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

        if (!isset($parameters['nonce'])) {
            $parameters['nonce'] = uniqid();
        }
        if (!isset($parameters['timestamp'])) {
            $parameters['timestamp'] = date('Y-m-d\TH:i:s\Z');
        }

        $parameters = $this->everthingStringize($parameters);

        ksort($parameters);
        date_default_timezone_set($defaultTimeZone);

        $parameters['sign'] = base64_encode(hash_hmac('sha256', $resource . '?' . http_build_query($parameters), $this->accessKeySecret, true));
        return $parameters;
    }
}
