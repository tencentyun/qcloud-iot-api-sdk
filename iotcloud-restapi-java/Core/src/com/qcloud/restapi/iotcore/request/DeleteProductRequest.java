package com.qcloud.restapi.iotcore.request;


public class DeleteProductRequest extends Request {

    /**
     * 构造DeleteProductRequest对象
     *
     * @param productID 从官网获得的productID
     */
    public DeleteProductRequest(String productID) {
        put("Action", "DeleteProduct");
        put("productID", productID);
    }
}
