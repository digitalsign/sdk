# 𝐃𝐢𝐠𝐢𝐭𝐚𝐥 𝐒𝐢𝐠𝐧® 𝐏𝐮𝐛𝐥𝐢𝐜 𝐊𝐞𝐲 𝐈𝐧𝐟𝐫𝐚𝐬𝐭𝐫𝐮𝐜𝐭𝐮𝐫𝐞's 𝐏𝐇𝐏 𝐒𝐃𝐊

这是 [Digital Sign® Public Key Infrastructure](https://www.digital-sign.com.cn) 开放API的 PHP SDK.

[![Build Status](https://travis-ci.com/digitalsign/sdk.svg?branch=master)](https://travis-ci.com/digitalsign/sdk)

[获取](https://www.digital-sign.com.cn/dashboard/agent/access-key) `AccessKey` 秘钥对.

此SDK包仅面向开发者提供支持，若您是分销商，您可以需要:
- [Digital Sign® Module for WHMCS](https://www.digital-sign.com/download/modules/whmcs-latest.zip)
- [Digital Sign® Module for HostBill](https://www.digital-sign.com/download/modules/hostbill-latest.zip)
- [Digital Sign® Module for 宝塔(bt.cn)](https://www.digital-sign.com/download/modules/bt-latest.zip)

## 安装

```bash
composer require digitalsign/sdk -vvv
```

## 使用

```php
<?php

use DigitalSign\Sdk\Client;

require __DIR__ . '/../vendor/autoload.php';

$sdk = new Client('accessKeyId', 'accessKeySecret');
$result = $sdk->product->productList();
print($result->products);
```

## 智能感知

我们的 SDK 将智能感知 Intellisense (VS Code、PHPStorm) 做为目标之一.
![Intellisense.png](https://user-images.githubusercontent.com/6964962/64444468-c5336700-d106-11e9-81aa-e660e72a1149.png)

## License

MIT