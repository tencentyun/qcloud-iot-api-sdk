package com.qcloud.restapi.iotcore.request;

public class CreateDeviceRequest extends Request {

    /**
     * 构造CreateDeviceRequest对象
     *
     * @param productID 从官网获得的productId
     * @param deviceName 设备名称
     */
    public CreateDeviceRequest(String productID, String deviceName) {
        put("Action", "CreateDevice");
        put("productID", productID);
        put("deviceName", deviceName);
    }
}
