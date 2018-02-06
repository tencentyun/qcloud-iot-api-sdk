<?php

namespace TXIoTCloud\Model;


class ProductMetadata
{

    /**
     * 创建产品的时间戳
     */
    private $creationDate;

    /**
     * ProductMetadata constructor.
     * @param $creationDate
     */
    public function __construct($creationDate)
    {
        $this->creationDate = $creationDate;
    }


    /**
     * 获取创建产品的时间戳
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * 设置创建产品的时间戳
     * @param $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }


}