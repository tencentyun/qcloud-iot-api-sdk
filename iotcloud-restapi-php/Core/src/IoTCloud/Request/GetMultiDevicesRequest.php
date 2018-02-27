<?php

namespace TXIoTCloud\Request;

require_once "GetCreateMultiDevTaskRequest.php";

class GetMultiDevicesRequest extends GetCreateMultiDevTaskRequest
{

    /**
     * 分页页数
     */
    private $pageNum;

    /**
     * 分页大小，每页返回设备个数
     */
    private $pageSize;

    /**
     * GetCreateMultiDevTaskRequest constructor.
     * @param $timestamp   当前unix时间戳
     * @param $nonce       随机正整数，与timestamp联合起来，用于防止重放攻击
     * @param $productID   产品ID
     * @param $taskID      任务ID
     * @param $pageNum     分页页数
     * @param $pageSize    分页大小
     */
    public function __construct($timestamp, $nonce, $productID, $taskID, $pageNum, $pageSize)
    {
        parent::__construct($timestamp, $nonce, $productID, $taskID);
        $this->pageNum = $pageNum;
        $this->pageSize = $pageSize;
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