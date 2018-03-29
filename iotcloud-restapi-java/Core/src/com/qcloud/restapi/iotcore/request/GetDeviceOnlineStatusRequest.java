package com.qcloud.restapi.iotcore.request;

public class GetDeviceOnlineStatusRequest extends Request {

    /**
     * 构造GetDeviceOnlineStatusRequest对象
     *
     * @param productID 从官网获得的productID
     * @param deviceNameList 设备名称数组。一次最多可查询100个设备的状态。设备名称规范参考官网要求。
     */
    public GetDeviceOnlineStatusRequest(String productID, String [] deviceNameList) {
        put("Action", "GetDeviceOnlineStatus");
        put("productID", productID);

        for (int i = 0;  deviceNameList != null && i < deviceNameList.length; i++) {
            put("listDeviceName."+i, deviceNameList[i]);
        }
    }
}
