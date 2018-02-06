<?php

namespace TXIoTCloud\Request;

require_once "ListProductsRequest.php";

class ListDevicesRequest extends ListProductsRequest
{

    /**
     * 需要查看设备列表的产品 ID
     */
    private $productID;

    /**
     * CreateProductRequest constructor.
     * @param $timestamp     当前unix时间戳
     * @param $nonce         随机正整数，与timestamp联合起来，用于防止重放攻击
     * @param $pageSize      分页的大小
     * @param $pageNum       请求的页数
     * @param $productID     产品ID
     */
    public function __construct($timestamp, $nonce, $pageSize, $pageNum, $productID)
    {
        parent::__construct($timestamp, $nonce, $pageSize, $pageNum);
        $this->productID = $productID;
    }

    /**
     * 获取需要查看设备列表的产品 ID
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * 设置需要查看设备列表的产品 ID
     * @param $productID
     */
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }

}