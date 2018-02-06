package com.qcloud.restapi.iotcore.utils;


import javax.crypto.Mac;
import javax.crypto.spec.SecretKeySpec;
import java.util.Base64;

public class HMACSHA1 {

    private static final String HMAC_SHA1 = "HmacSHA1";

    /**
     * 生成签名数据
     *
     * @param data 待加密的数据
     * @param key  加密使用的key
     * @return 生成BASE64编码的字符串
     */
    public static String getSignature(byte[] data, byte[] key)  {
        try {
            SecretKeySpec signingKey = new SecretKeySpec(key, HMAC_SHA1);
            Mac mac = Mac.getInstance(HMAC_SHA1);
            mac.init(signingKey);

            byte[] rawHmac = mac.doFinal(data);

            String base64Str = Base64.getEncoder().encodeToString(rawHmac);

            return base64Str;
        }catch (Exception e) {
            e.printStackTrace();
        }

        return "";
    }
}