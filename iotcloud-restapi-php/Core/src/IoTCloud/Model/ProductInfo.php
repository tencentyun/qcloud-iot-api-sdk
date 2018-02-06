<?php

namespace TXIoTCloud\Model;


class ProductInfo
{

    /**
     * 产品的其他信息，包括产品创建日期时间，类型为ProductMetadata
     */
    private $productMetaData;

    /**
     * 有关产品的信息，包括产品描述，类型为ProductProperties
     */
    private $productProperties;

    /**
     * 产品名称
     */
    private $productName;

    /**
     * 产品ID
     */
    private $productID;

    /**
     * ProductInfo constructor.
     */
    public function __construct()
    {
    }

    /**
     * 获取产品的其他信息
     * @return ProductMetadata
     */
    public function getProductMetaData()
    {
        return $this->productMetaData;
    }

    /**
     * 设置产品的其他信息
     * @param ProductMetadata $productMetaData
     */
    public function setProductMetaData(ProductMetadata $productMetaData)
    {
        $this->productMetaData = $productMetaData;
    }

    /**
     * 获取有关产品的信息
     * @return ProductProperties
     */
    public function getProductProperties()
    {
        return $this->productProperties;
    }

    /**
     * 设置有关产品的信息
     * @param ProductProperties $productProperties
     */
    public function setProductProperties(ProductProperties $productProperties)
    {
        $this->productProperties = $productProperties;
    }

    /**
     * 获取产品名称
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * 设置产品名称
     * @param $productName
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
    }

    /**
     * 获取产品ID
     * @return string
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * 设置产品ID
     * @param string $productID
     */
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }


}