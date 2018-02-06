package com.qcloud.restapi.iotcore.request;

public class DeleteDeviceRequest extends Request {

    /**
     * 构造DeleteDeviceRequest对象
     *
     * @param productID 从官网获得的productID
     * @param deviceName 设备名称
     */
    public DeleteDeviceRequest(String productID, String deviceName) {
        put("Action", "DeleteDevice");
        put("productID", productID);
        put("deviceName", deviceName);
    }
}
