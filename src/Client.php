<?php

namespace DigitalSign\Sdk;

use DigitalSign\Sdk\Exceptions\DoNotHavePrivilegeException;
use DigitalSign\Sdk\Exceptions\InsufficientBalanceException;
use DigitalSign\Sdk\Exceptions\RequestException;
use DigitalSign\Sdk\Resources\Order;
use DigitalSign\Sdk\Resources\Product;
use DigitalSign\Sdk\Traits\SignTrait;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\RequestOptions;

use function GuzzleHttp\json_decode;

/**
 * @method mixed get($uri, $parameters = [])
 * @method mixed post($uri, $parameters = [])
 */
class Client
{
    use SignTrait;

    const ORIGIN_API = 'https://api.digital-sign.com.cn';

    const ORIGIN_API_STAGING = 'https://staging.api.digital-sign.com.cn';

    const ORIGIN_API_DEV = 'https://dev.api.digital-sign.com.cn';

    const CODE_EXCEPTION_MAP = [
        'INSUFFICIENT_BALANCE' => InsufficientBalanceException::class,
        'DO_NOT_HAVE_RIVILEGE' => DoNotHavePrivilegeException::class,
    ];

    /**
     * @var Product
     */
    public $product;

    /**
     * @var Order
     */
    public $order;

    /**
     * @var string
     */
    protected $accessKeyId;

    /**
     * @var string
     */
    protected $accessKeySecret;

    /**
     * @var string
     */
    protected $apiOrigin;

    /**
     * @var int
     */
    protected $connectTimeout;

    /**
     * @var int
     */
    protected $readTimeout;

    public function __construct($accessKeyId, $accessKeySecret, $apiOrigin = null, $connectTimeout = 5, $readTimeout = 15)
    {
        if ($apiOrigin === null) {
            $apiOrigin = self::ORIGIN_API;
        }

        $this->accessKeyId = $accessKeyId;
        $this->accessKeySecret = $accessKeySecret;
        $this->apiOrigin = $apiOrigin;

        $this->product = new Product($this);
        $this->order = new Order($this);
        $this->connectTimeout = $connectTimeout;
        $this->readTimeout = $readTimeout;
        //$this->callback = new Callback($this);
    }

    /**
     * 魔术
     *
     * @param string $method GET、POST
     * @param array $arguments 第一个参数为API的路径，第二个参数为业务参数
     * @return \DigitalSign\Sdk\Response\Interfaces\BaseResponse
     */
    public function __call($method, $arguments = [])
    {
        $http = new GuzzleHttpClient([
            RequestOptions::CONNECT_TIMEOUT => $this->connectTimeout,
            RequestOptions::READ_TIMEOUT => $this->readTimeout,
        ]);

        $api = $arguments[0];
        $resource = '/' . $api;

        $parameters = isset($arguments[1]) ? $arguments[1] : [];
        $parameters = $this->sign($resource, $parameters, $this->accessKeyId, $this->accessKeySecret);

        $uri = $this->apiOrigin . $resource;

        $response = $http->{$method}($uri, [
            ($method == 'get' ? 'query' : RequestOptions::JSON) => $parameters,
        ]);

        $json = json_decode($response->getBody());

        if (!isset($json->success) || !$json->success) {
            $exception_class = RequestException::class;
            $map = static::CODE_EXCEPTION_MAP;
            if (!isset($json->error_code)) {
                throw new RequestException('未知错误', -1);
            }
            if (isset($map[$json->error_code])) {
                $exception_class = $map[$json->error_code];
            }
            throw new $exception_class(isset($json->message) ? $json->message : '请求接口出错', isset($json->error_code) ? $json->error_code : -1);
        }
        return $json->data;
    }
}
