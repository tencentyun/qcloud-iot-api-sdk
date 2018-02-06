package com.qcloud.restapi.iotcore.response;

import com.google.gson.*;

import java.util.ArrayList;
import java.util.List;

public class ListProductsResponse extends Response {
    public class ProductInfo {
        public String productName = "";
        public String productID = "";
        public String productDescription = "";
        public String encryptionType = "";
        public String region = "";
        public String creationDate = "";

        public ProductInfo() {

        }
    }

    /**
     * 解析JSON字串并构造ListProductsResponse对象
     *
     * @param response 从服务端返回的应答JSON字串
     */
    public ListProductsResponse(String response) {
        super(response);
    }

    public List <ProductInfo> getProducts() {
        List <ProductInfo> list = new ArrayList<>();

        try {
            JsonArray arr = jsonObj.getAsJsonArray("products");
            for (int i = 0; i < arr.size(); i++) {
                ProductInfo info = new ProductInfo();

                info.productName = arr.get(i).getAsJsonObject().get("productName").getAsString();
                info.productID = arr.get(i).getAsJsonObject().get("productID").getAsString();

                info.productDescription = arr.get(i).getAsJsonObject().get("productProperties").getAsJsonObject().get("productDescription").getAsString();
                info.encryptionType = arr.get(i).getAsJsonObject().get("productProperties").getAsJsonObject().get("encryptionType").getAsString();
                info.region = arr.get(i).getAsJsonObject().get("productProperties").getAsJsonObject().get("region").getAsString();

                info.creationDate = arr.get(i).getAsJsonObject().get("productMetadata").getAsJsonObject().get("creationDate").getAsString();

                list.add(info);
            }
        }catch (Exception e) {
        }

        return list;
    }
}
