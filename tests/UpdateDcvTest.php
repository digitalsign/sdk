<?php

namespace DigitalSign\Sdk\Test;

use DigitalSign\Sdk\Requests\CertificateUpdateDcvRequest;

final class UpdateDcvTest extends TestCase
{
    public function testUpdateDcv()
    {
        $domain = 'testapi.staging.digital-sign.com.cn';
        $request = new CertificateUpdateDcvRequest();
        $request->digitalsign_id = $_SERVER['DIGITALSIGN_ORDER_ID'];
        $request->domain = $domain;
        $request->type = 'email';
        $request->value = 'admin@' . $domain;
        $result = $this->sdk()->order->certificateUpdateDcv($request);

        $this->assertObjectHasAttribute($domain, $result);
    }
}
