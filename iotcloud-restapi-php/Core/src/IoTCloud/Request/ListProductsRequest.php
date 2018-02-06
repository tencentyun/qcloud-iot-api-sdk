<?php

namespace TXIoTCloud\Request;

require_once "BaseRequest.php";

class ListProductsRequest extends BaseRequest
{

    /**
     * 分页的大小，数值范围 10-250
     */
    protected $pageSize;

    /**
     * 请求的页数
     */
    protected $pageNum;

    /**
     * CreateProductRequest constructor.
     * @param $timestamp     当前unix时间戳
     * @param $nonce         随机正整数，与timestamp联合起来，用于防止重放攻击
     * @param $pageSize      分页的大小
     * @param $pageNum       请求的页数
     */
    public function __construct($timestamp, $nonce, $pageSize, $pageNum)
    {
        parent::__construct($timestamp, $nonce);
        $this->pageSize = $pageSize;
        $this->pageNum = $pageNum;
    }

    /**
     * 获取分页的大小
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * 设置分页的大小
     * @param $pageSize
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    /**
     * 获取请求的页数
     */
    public function getPageNum()
    {
        return $this->pageNum;
    }

    /**
     * 设置请求的页数
     * @param $pageNum
     */
    public function setPageNum($pageNum)
    {
        $this->pageNum = $pageNum;
    }

}