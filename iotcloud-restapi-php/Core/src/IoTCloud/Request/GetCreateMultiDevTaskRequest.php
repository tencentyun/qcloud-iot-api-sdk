<?php

namespace TXIoTCloud\Request;

require_once "BaseRequest.php";

class GetCreateMultiDevTaskRequest extends BaseRequest
{

    /**
     * 产品 ID，创建产品时腾讯云为用户分配全局唯一的 ID
     */
    protected $productID;

    /**
     * 任务 ID，由批量创建设备接口返回
     */
    protected $taskID;

    /**
     * GetCreateMultiDevTaskRequest constructor.
     * @param $timestamp   当前unix时间戳
     * @param $nonce       随机正整数，与timestamp联合起来，用于防止重放攻击
     * @param $productID   产品
     * @param $taskID      任务ID
     */
    public function __construct($timestamp, $nonce, $productID, $taskID)
    {
        parent::__construct($timestamp, $nonce);
        $this->productID = $productID;
        $this->taskID = $taskID;
    }

    /**
     * 获取产品ID
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * 设置产品ID
     */
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }

    /**
     * 获取任务ID
     */
    public function getTaskID()
    {
        return $this->taskID;
    }

    /**
     * 设置任务ID
     * @param $taskID
     */
    public function setTaskID($taskID)
    {
        $this->taskID = $taskID;
    }


}