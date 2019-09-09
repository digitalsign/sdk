<?php

use DigitalSign\Sdk\Client;
use DigitalSign\Sdk\Requests\CertificateCreateRequest;
use DigitalSign\Sdk\Requests\CertificateReissueRequest;
use DigitalSign\Sdk\Requests\CertificateUpdateDcvRequest;
use Illuminate\Support\Str;

require __DIR__ . '/../../vendor/autoload.php';

$sdk = new Client('Trr1955DTkVVOBGE', 'GuL8PncwImH05POunCEzJ9Bv4nY', Client::ORIGIN_API_STAGING);

// 测试产品列表
// $result = $sdk->product->productList();
// dd($result->products);

$request = new CertificateUpdateDcvRequest();
$request->digitalsign_id = 5263;
$request->domain = 'testapi.staging.digital-sign.com.cn';
$request->type = 'email';
$request->value = 'admin@digital-sign.com.cn';

$result = $sdk->order->certificateUpdateDcv($request);
dump($result);