package com.qcloud.restapi.iotcore.request;

public class UpdateDeviceShadowRequest extends Request {

    /**
     * 构造UpdateDeviceShadowRequest对象
     *
     * @param productID 从官网获得的productID
     * @param deviceName 设备名称
     * @param stateJsonDocument 影子内容JSON字串
     * @param version 版本号
     */
    public UpdateDeviceShadowRequest(String productID, String deviceName, String stateJsonDocument, long version) {
        put("Action", "UpdateDeviceShadow");
        put("productID", productID);
        put("deviceName", deviceName);
        put("state", stateJsonDocument);
        put("version", String.valueOf(version));
    }
}
