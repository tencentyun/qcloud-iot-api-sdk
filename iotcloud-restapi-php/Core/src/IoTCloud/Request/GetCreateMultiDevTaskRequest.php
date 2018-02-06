<?php

namespace TXIoTCloud\Request;

require_once "BaseRequest.php";

class GetCreateMultiDevTaskRequest extends BaseRequest
{

    /**
     * 任务 ID，由批量创建设备接口返回
     */
    protected $taskID;

    /**
     * GetCreateMultiDevTaskRequest constructor.
     * @param $timestamp   当前unix时间戳
     * @param $nonce       随机正整数，与timestamp联合起来，用于防止重放攻击
     * @param $taskID      任务ID
     */
    public function __construct($timestamp, $nonce, $taskID)
    {
        parent::__construct($timestamp, $nonce);
        $this->taskID = $taskID;
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