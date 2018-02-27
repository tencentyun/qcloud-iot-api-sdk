<?php

namespace TXIoTCloud\Request;

require_once "BaseRequest.php";

class CreateProductRequest extends BaseRequest
{

    /**
     * 产品名称，名称不能和已存在的产品名称重复。命名规则：[a-zA-Z0-9:_-]{1,32}
     */
    private $productName;

    /**
     * 产品属性
     */
    private $productProperties;

    /**
     * CreateProductRequest constructor.
     * @param $timestamp            当前unix时间戳
     * @param $nonce                随机正整数，与timestamp联合起来，用于防止重放攻击
     * @param $productName          产品名称
     * @param $productProperties    产品属性（ProductProperties实例）
     */
    public function __construct($timestamp, $nonce, $productName, $productProperties)
    {
        parent::__construct($timestamp, $nonce);
        $this->productName = $productName;
        $this->productProperties = $productProperties;
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
     * 获取产品属性
     * @return ProductProperties
     */
    public function getProductProperties()
    {
        return $this->productProperties;
    }

    /**
     * 设置产品属性
     * @param ProductProperties
     */
    public function setProductProperties($productProperties)
    {
        $this->productProperties = $productProperties;
    }


}