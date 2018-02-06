<?php

namespace TXIoTCloud\Request;

require_once "BaseRequest.php";

class DeleteProductRequest extends BaseRequest
{

    /**
     * 需要删除的产品ID
     */
    private $productID;

    /**
     * DeleteProductRequest constructor.
     * @param $timestamp   当前unix时间戳
     * @param $nonce       随机正整数，与timestamp联合起来，用于防止重放攻击
     * @param $productID   需要删除的产品ID
     */
    public function __construct($timestamp, $nonce, $productID)
    {
        parent::__construct($timestamp, $nonce);
        $this->productID = $productID;
    }

    /**
     * 获取需要删除的产品ID
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * 设置需要刪除的产品ID
     * @param $productID
     */
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }

}