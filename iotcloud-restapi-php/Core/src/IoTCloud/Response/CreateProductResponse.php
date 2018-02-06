<?php

namespace TXIoTCloud\Response;

require_once "BaseResponse.php";

class CreateProductResponse extends BaseResponse
{
    /**
     * 产品名称
     */
    private $productName;

    /**
     * 产品ID
     */
    private $productID;

    public function __construct()
    {
    }

    /**
     * 获取产品名称
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * 设置产品名称
     * @param
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
    }

    /**
     * 获取产品ID
     */
    public function getProductId()
    {
        return $this->productID;
    }

    /**
     * 设置产品ID
     * @param
     */
    public function setProductId($productID)
    {
        $this->productID = $productID;
    }


}