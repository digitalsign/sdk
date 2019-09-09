<?php

namespace DigitalSign\Sdk\Test;

use DigitalSign\Sdk\Requests\CertificateReissueRequest;

final class ReissueCertificateTest extends TestCase
{
    public function testReissue()
    {
        $domain = 'testapi.staging.digital-sign.com.cn';
        $request = new CertificateReissueRequest();
        $request->digitalsign_id = 176133;
        $request->csr = $this->csr();
        $request->period = 'Quarterly';
        $request->contact_email = 'xiaohui.lam@e.hexdata.cn';
        $request->domain_dcv = [
            $domain => 'dns',
        ];
        $request->notify_url = 'https://partner.app/notify';
        try {
            $result = $this->sdk()->order->certificateReissue($request);
        } catch (\Exception $e) {

        }

        // $this->assertObjectHasAttribute('digitalsign_id', $result);
        // $this->assertObjectHasAttribute('cost', $result);
        // $this->assertObjectHasAttribute('status', $result);
        // $this->assertObjectHasAttribute('dcv', $result);
        // $this->assertObjectHasAttribute($domain, $result->dcv);
    }
}
