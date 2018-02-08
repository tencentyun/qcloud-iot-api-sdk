package com.qcloud.restapi.iotcore.request;

public class GetMultiDevicesRequest extends Request {

    /**
     * 构造GetMultiDevicesRequest对象
     *
     * @param productID 服务端应答返回的productID
     * @param taskID 服务端应答返回的taskID（可从GetCreateMultiDevTaskResponse对像中获取taskID）
     */
    public GetMultiDevicesRequest(String productID, String taskID) {
        put("Action", "GetMultiDevices");
        put("productID", productID);
        put("taskID", taskID);
        put("pageSize", "10");
        put("pageNum", "1");
    }

    /**
     * 构造GetMultiDevicesRequest对象
     *
     * @param taskID 服务端应答返回的taskID（可从GetCreateMultiDevTaskResponse对像中获取taskID）
     * @param pageSize
     * @param pageNum
     */
    public GetMultiDevicesRequest(String taskID, int pageSize, int pageNum) {
        put("Action", "GetMultiDevices");
        put("taskID", taskID);
        put("pageSize", String.valueOf(pageSize));
        put("pageNum", String.valueOf(pageNum));
    }
}
