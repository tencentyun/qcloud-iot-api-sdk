package com.qcloud.restapi.iotcore.request;

import com.google.gson.*;

public class CreateProductRequest extends Request {

    /**
     * 构造CreateProductRequest对象
     *
     * @param productName 产品名称
     * @param productDescription 产品名称
     * @param region 区域标识串
     */
    public CreateProductRequest(String productName, String productDescription, String region) {
        put("Action", "CreateProduct");
        put("productName", productName);

        JsonObject jsonObj = new JsonObject();

        jsonObj.addProperty("productDescription", productDescription);
        jsonObj.addProperty("region", region);

        put("productProperties", jsonObj.toString());
    }
}
