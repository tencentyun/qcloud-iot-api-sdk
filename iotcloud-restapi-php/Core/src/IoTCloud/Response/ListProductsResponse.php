<?php

namespace TXIoTCloud\Response;

require_once "BaseResponse.php";

class ListProductsResponse extends BaseResponse
{
    /**
     * 产品总数
     */
    private $totalCnt;

    /**
     * 产品对象的数组，数组元素为ProductInfo实例
     */
    private $products;

    public function __construct()
    {
    }

    /**
     * 获取产品总数
     */
    public function getTotalCnt()
    {
        return $this->totalCnt;
    }

    /**
     * 设置产品总数
     * @param $totalCnt
     */
    public function setTotalCnt($totalCnt)
    {
        $this->totalCnt = $totalCnt;
    }

    /**
     * 获取产品对象的数组
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * 设置产品对象的数组
     * @param $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }


}