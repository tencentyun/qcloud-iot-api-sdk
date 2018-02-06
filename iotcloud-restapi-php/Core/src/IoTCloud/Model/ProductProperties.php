<?php

namespace TXIoTCloud\Model;


class ProductProperties
{

    /**
     * 产品描述
     */
    private $productDescription;

    /**
     * 加密类型
     */
    private $encryptionType;

    /**
     * 产品所属区域
     */
    private $region;

    /**
     * ProductProperties constructor.
     */
    public function __construct()
    {
    }

    /**
     * 获取产品描述
     */
    public function getProductDescription()
    {
        return $this->productDescription;
    }

    /**
     * 设置产品描述
     * @param $productDescription
     */
    public function setProductDescription($productDescription)
    {
        $this->productDescription = $productDescription;
    }

    /**
     * 获取加密方式
     */
    public function getEncryptionType()
    {
        return $this->encryptionType;
    }

    /**
     * 设置加密方式
     * @param $encryptionType
     */
    public function setEncryptionType($encryptionType)
    {
        $this->encryptionType = $encryptionType;
    }

    /**
     * 获取产品所属区域
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * 设置产品所属区域
     * @param $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

}