<?php

namespace DigitalSign\Sdk\Scheme;

/**
 * 订单详情格式
 *
 * @property float $cost 本订单的成本
 * @property integer $digitalsign_id 帝玺的订单号
 * @property string $status pending、valid、issued、cancelled
 * @property \DigitalSign\Sdk\Scheme\Certificate\DnsDCV[]|\DigitalSign\Sdk\Scheme\Certificate\EmailDCV[]|\DigitalSign\Sdk\Scheme\Certificate\HttpDCV[]|\DigitalSign\Sdk\Scheme\Certificate\HttpsDCV[] $dcv
 * @property string $issued_cert 签发的证书
 * @property string $issuer_cert 签发者证书
 */
class CertificateDetailScheme
{
}
