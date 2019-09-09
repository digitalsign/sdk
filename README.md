# 𝐃𝐢𝐠𝐢𝐭𝐚𝐥 𝐒𝐢𝐠𝐧® 𝐏𝐮𝐛𝐥𝐢𝐜 𝐊𝐞𝐲 𝐈𝐧𝐟𝐫𝐚𝐬𝐭𝐫𝐮𝐜𝐭𝐮𝐫𝐞's 𝐏𝐇𝐏 𝐒𝐃𝐊

The php sdk for [Digital Sign® Public Key Infrastructure](https://www.digital-sign.com.cn).

[Get](https://www.digital-sign.com.cn/dashboard/agent/access-key) the `AccessKey` key pair.

This sdk is released for professional php engineers.

Maybe you are looking for official modules:
- [Digital Sign® Module for WHMCS](https://www.digital-sign.com/download/modules/whmcs-latest.zip)
- [Digital Sign® Module for HostBill](https://www.digital-sign.com/download/modules/hostbill-latest.zip)
- [Digital Sign® Module for 宝塔(bt.cn)](https://www.digital-sign.com/download/modules/bt-latest.zip)

## Installation

```bash
composer require digitalsign/sdk -vvv
```

## Usage

```php
<?php

use DigitalSign\Sdk\Client;

require __DIR__ . '/../vendor/autoload.php';

$sdk = new Client('ArQS4AVlUsV69mcN', '5WMp5M7f75a8OvzmamiEZ7yvI');
$result = $sdk->product->productList();
print($result->products);
```

## Intellisense

Our major features support Intellisense(VS Code、PHPStorm).
![Intellisense.png](https://user-images.githubusercontent.com/6964962/64444468-c5336700-d106-11e9-81aa-e660e72a1149.png)

## License

MIT