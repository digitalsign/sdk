<?php

use DigitalSign\Sdk\Client;
use DigitalSign\Sdk\Requests\CertificateReissueRequest;
use Illuminate\Support\Str;

require __DIR__ . '/../../vendor/autoload.php';

$sdk = new Client('Trr1955DTkVVOBGE', 'GuL8PncwImH05POunCEzJ9Bv4nY', Client::ORIGIN_API_STAGING);

// 测试产品列表
// $result = $sdk->product->productList();
// dd($result->products);

$request = new CertificateReissueRequest();
$request->digitalsign_id = 5263;
$request->unique_id = Str::random();
$request->product_id = 6;
$request->period = 'Quarterly';
$request->contact_email = 'xiaohui.lam@e.hexdata.cn';
$request->domain_dcv = [
    'testapi.staging.digital-sign.com.cn' => 'dns',
];
$request->notify_url = 'https://webhook.site/a5dbdbe4-e335-4059-87ad-c85d697b2689';

//$result = $sdk->order->certificateCreate($request);
//dump($result);
//exit;

//$request = new CertificateReissueRequest();
//$request->domain_dcv = ['www.baidu.com' => 'dns', 'www2.baidu.com' => 'http',];
//$request->csr = 'aaa';
//$request->notify_url = 'https://www.baidu.com/test';

$result = $sdk->order->certificateReissue($request);
dump($result);