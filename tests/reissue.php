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
$request->csr = '-----BEGIN CERTIFICATE REQUEST-----
MIIE2DCCAsACAQAwTzELMAkGA1UEBhMCQ04xFzAVBgNVBAMMDnd3dy5oZXhkYXRh
LmNuMScwJQYJKoZIhvcNAQkBFhh4aWFvaHVpLmxhbUBlLmhleGRhdGEuY24wggIi
MA0GCSqGSIb3DQEBAQUAA4ICDwAwggIKAoICAQC3Di3xa6XVtojvD66o+OCwldYX
1rIOZol3AZ2QbKjVl9avYbb7avB1Iyvis7LVXuzFMLjzSSGQsZu4YBKUVQZ8zrw9
1ROWsBXQlSUMuZqkNYt1VKPfZUoPgaDkM5RNMBOa7DeCCyxkxdu1cVVirJvZ/fHu
iamU1n47079d70JHTPoWd4Ug3D4pL2W/HRfJn8BRcvBzKUYo7bFZB+SluBjlm5Yh
IFmBWSjvFlM7z+QHCt7fFA/PmatJfPVAucdSQnbN3gji8BfovncL8rtM5hC7qFZ9
+AiTJya5L+spYzxNDIb2bGuNkssKtPYgFGkU7Y/TH+a4PxRUAbsbTRI4E1gOz7AQ
hRY3XedLjZVtDBRJDGIIobhZf8dNjVwAq7OOn/vbR4IijQ4mW4/+jm9TLVIUkpVb
33yO3Ci+wrI34KVkDBnczDub4aEg5yIm6lfedrtSUgzBs2jbV46XUrVjtnVRc2EM
pu7zToQ7ShpykAmJYZmQOzjP7au3OhtyIpFH7iNXe0ME76Hbgxsk6NpfBxKci460
dhRcggzZgt6deENtjv+AuZg2dDIlIbWFF4a3TvKM2f+R1tLaU+3O4DqFuxrU0Tij
4oiLKl6Vljrrs2kON++02uLXQ6hCxjS4cJ04aofirmsCdH7j+vexpqsnPOP5WuXU
Dolt6PgmpGdED2BneQIDAQABoEQwQgYJKoZIhvcNAQkOMTUwMzAJBgNVHRMEAjAA
MAsGA1UdDwQEAwIF4DAZBgNVHREEEjAQgg53d3cuaGV4ZGF0YS5jbjANBgkqhkiG
9w0BAQsFAAOCAgEAAO/2beQZXkCSGnmPEpY30SVaibD/RVGv9nPG00XY1nAg389l
S60ogWnduaFUKlQduc5cv0kYGUcNYEiqDMPO3ShSNSsjSSNAG5zP1jiMyV6s7a6+
na0qNCZyXkuEgeEJVhsc5q7m2nFgdGU6pPJA+5/7tANyR7xkJSQoAHxASTwaZ9FN
hC8qXRuJfklPjxSv/YB0ZhKsxs67cCP0A0mxZMh5yY7PeUCzPnJYZfsmXpVNF3wx
btEyzFHMXGJ7frK0kwkbkhss/89yE7VrM51eOtXSyLCBQyIuSaEqhuvxwuTnG5Oo
vNfVEZUAW1oEN0wM97272nS8G62oYAho1iUmXFCVksNRNH1Yhe3uKvOLKpC7I0Ef
Xp1HqeIxm5CBMfhNcPppwTV5FFomAT1cOowOlQsa2jf7VQbygNy6medj8aARr8F+
IXVMJfIn62tGjuXglAc9x+4UlH1R46fARoCBhvfOJcYJ/8FJwnYddP5kgPzZgcOF
XjfAxlfu67g2ziCic6gtyt+SRYCNLIxBz99lGRj3zXlNLouPxMy99sEoXO3lIgJq
s4cstKzaK0MA4ghOBKJhyCPNOdxJUcsGuVCWFoXMx7QcXcCzrI0A74FGRMKRa6q/
zDUNg1i9krVrWMOYyBUQxNHju0eXRsb0vaE0s3c0ayHBjnu8019Ebt6Q9mI=
-----END CERTIFICATE REQUEST-----';
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