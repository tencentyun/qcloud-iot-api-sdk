<?php

namespace TXIoTCloud\Model;


class ProductProperties
{

    /**
     * 产品描述
     */
    private $productDescription;

    /**
     * 加密类型，1表示非对称加密，2表示对称加密，默认值是1
     */
    private $encryptionType = "1";

    /**
     * 产品所属区域
     */
    private $region;

    /**
     * ProductProperties constructor.
     * @param $productDescription   产品描述
     * @param $encryptionType       加密类型，1表示非对称加密，2表示对称加密，默认值是1
     * @param $region               产品所属区域
     */
    public function __construct($productDescription, $encryptionType, $region)
    {
        $this->productDescription = $productDescription;
        $this->encryptionType = $encryptionType;
        $this->region = $region;
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
     * 设置加密方式，1表示非对称加密，2表示对称加，默认值是1
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