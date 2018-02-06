package com.qcloud.restapi.iotcore.response;

import com.google.gson.*;

public class Response {
    protected JsonElement jsonElement;
    protected JsonObject jsonObj;
    protected int code  = -1;
    protected String codeDesc = "";
    protected String message = "";

    /**
     * 响应对象基类（根据JSON字串构造响应对象）
     * @response 从服务端返回的JSON字串
     */
    public Response(String response) {
        try {
            jsonElement = new JsonParser().parse(response);
            jsonObj = jsonElement.getAsJsonObject();
			
            code = jsonObj.get("code").getAsInt();
            codeDesc = jsonObj.get("codeDesc").getAsString();
            message = jsonObj.get("message").getAsString();
        }catch (Exception e) {

        }
    }

    /**
     * 获取响应码
     * @return 0：表示成功；其它：表示失败。详见官网定义。
     */
    public int getCode() {


        return code;
    }

    /**
     * 获取响应码描述
     * @return 描述
     */
    public String getCodeDesc() {


        return codeDesc;
    }

    /**
     * 获取响应描述
     * @return 描述
     */
    public String getMessage() {

        return message;
    }

    public String toString() {
        return "code:" + getCode() + ", codeDesc:" + getCodeDesc() + ", message:" + getMessage();
    }
}
