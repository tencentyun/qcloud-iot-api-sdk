package com.qcloud.restapi.iotcore.request;

public class CreateMultiDeviceRequest extends Request {

    /**
     * 构造CreateMultiDeviceRequest对象
     *
     * @param productID 从官网获得的productID
     * @param deviceNameList 设备名称数组。一次最多可创建100个设备。设备名称规范参考官网要求。
     */
    public CreateMultiDeviceRequest(String productID, String [] deviceNameList) {
        put("Action", "CreateMultiDevice");
        put("productID", productID);

        for (int i = 0;  deviceNameList != null && i < deviceNameList.length; i++) {
            put("listDeviceName."+i, deviceNameList[i]);
        }
    }
}
