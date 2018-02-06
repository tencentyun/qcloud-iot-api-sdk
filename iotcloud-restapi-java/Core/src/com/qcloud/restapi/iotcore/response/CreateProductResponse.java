package com.qcloud.restapi.iotcore.response;

import com.google.gson.*;

public class CreateProductResponse extends Response {
    /**
     * 解析JSON字串并构造CreateProductResponse对象
     *
     * @param response 从服务端返回的应答JSON字串
     */
    public CreateProductResponse(String response) {
        super(response);
    }

    public String getProductID() {
        try {
            if (jsonObj != null) {
                return jsonObj.get("productID").getAsString();
            }
        }catch (Exception e) {
        }

        return "";
    }

    public String getProductName() {
        try {
            if (jsonObj != null) {
                return jsonObj.get("productName").getAsString();
            }
        }catch (Exception e) {
        }

        return "";
    }
}
