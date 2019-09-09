<?php

namespace DigitalSign\Sdk\Resources;

class Product extends AbstractResource
{
    /**
     * 列出产品及价格
     *
     * @return \DigitalSign\Sdk\Scheme\ProductListScheme
     */
    public function productList()
    {
        return $this->client->get('product/list');
    }
}