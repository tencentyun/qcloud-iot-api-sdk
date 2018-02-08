package com.qcloud.restapi.iotcore.request;

import com.google.gson.*;

public class CreateProductRequest extends Request {

    /**
     * 构造CreateProductRequest对象
     *
     * @param productName 产品名称
     * @param productDescription 产品名称
     * @param encryptionType 加密类型。1: 非对称加密；2: 对称加密；
     * @param region 区域标识串
     */
    public CreateProductRequest(String productName, String productDescription, String encryptionType, String region) {
        put("Action", "CreateProduct");
        put("productName", productName);

        JsonObject jsonObj = new JsonObject();

        jsonObj.addProperty("productDescription", productDescription);
        jsonObj.addProperty("encryptionType", encryptionType);
        jsonObj.addProperty("region", region);

        put("productProperties", jsonObj.toString());
    }

    /**
     * 构造CreateProductRequest对象
     *
     * @param productName 产品名称
     * @param productDescription 产品名称
     * @param region 区域标识串
     */
    public CreateProductRequest(String productName, String productDescription, String region) {
        this(productName, productDescription, "1", region);
    }
}
