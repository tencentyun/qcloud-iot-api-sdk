package com.qcloud.restapi.iotcore.request;

public class GetDeviceShadowRequest extends Request {

    /**
     * 构造GetDeviceShadowRequest对象
     *
     * @param productID 从官网获得的productID
     * @param deviceName 设备名称
     */
    public GetDeviceShadowRequest(String productID, String deviceName) {
        put("Action", "GetDeviceShadow");
        put("productID", productID);
        put("deviceName", deviceName);
    }
}
