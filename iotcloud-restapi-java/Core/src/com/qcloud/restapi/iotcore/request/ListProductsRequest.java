package com.qcloud.restapi.iotcore.request;

public class ListProductsRequest extends Request {

    /**
     * 构造ListProductsRequest对象
     */
    public ListProductsRequest() {
        put("Action", "ListProducts");
        put("pageSize", "10");
        put("pageNum", "1");
    }

    /**
     * 构造ListProductsRequest对象
     * @param pageSize
     * @param pageNum
     */
    public ListProductsRequest(int pageSize, int pageNum) {
        put("Action", "ListProducts");
        put("pageSize", String.valueOf(pageSize));
        put("pageNum", String.valueOf(pageNum));
    }
}
