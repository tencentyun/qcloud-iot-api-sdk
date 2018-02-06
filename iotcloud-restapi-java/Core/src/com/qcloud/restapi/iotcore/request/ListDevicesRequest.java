package com.qcloud.restapi.iotcore.request;

public class ListDevicesRequest extends Request {

    /**
     * 构造ListDevicesRequest对象
     *
     * @param productID 从官网获得的productID
     */
    public ListDevicesRequest(String productID) {
        put("Action", "ListDevices");
        put("productID", productID);
        put("pageSize", "10");
        put("pageNum", "1");
    }

    /**
     * 构造ListDevicesRequest对象
     *
     * @param productID 从官网获得的productID
     * @param pageSize
     * @param pageNum
     */
    public ListDevicesRequest(String productID, int pageSize, int pageNum) {
        put("Action", "ListDevices");
        put("productID", productID);
        put("pageSize", String.valueOf(pageSize));
        put("pageNum", String.valueOf(pageNum));
    }
}
