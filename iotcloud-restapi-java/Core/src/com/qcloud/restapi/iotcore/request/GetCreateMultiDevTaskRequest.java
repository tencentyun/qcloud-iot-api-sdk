package com.qcloud.restapi.iotcore.request;

public class GetCreateMultiDevTaskRequest extends Request {

    /**
     * 构造GetCreateMultiDevTaskRequest对象
     *
     * @param productID 服务端应答返回的productID
     * @param taskID 服务端应答返回的taskID（可从GetCreateMultiDevTaskResponse对像中获取taskID）
     */
    public GetCreateMultiDevTaskRequest(String productID, String taskID) {
        put("Action", "GetCreateMultiDevTask");
        put("productID", productID);
        put("taskID", taskID);
    }
}
