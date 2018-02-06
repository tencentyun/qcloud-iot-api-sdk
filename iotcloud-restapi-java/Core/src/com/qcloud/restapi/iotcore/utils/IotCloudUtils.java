package com.qcloud.restapi.iotcore.utils;

import com.qcloud.restapi.iotcore.request.Request;

import java.util.*;

public class IotCloudUtils {
    public static String TX_IOTCLOUD_URL = "iotcloud.api.qcloud.com/v2/index.php?";


    /**
     * 根据参数生成符合TX Iot Cloud要求的请求URL
     *
     * @param request 请求对像
     * @param secretId  从官网获取的secretId
     * @param secretKey 从官网获取的secretKey
     * @param region 区域标识串
     * @return 符合TX Iot Cloud要求的请求URL
     */
    public static String buildRequestURL(Request request, String secretId, String secretKey, String region) {
        putCommons(request, secretId, region);

        String parameter = getParameterString(request, true);
        String signature = getSignatureString(request, secretKey);

        String requestURL = "https://" + IotCloudUtils.TX_IOTCLOUD_URL + parameter + "&Signature=" + signature;

        return requestURL;
    }

    private static String getParameterString(Map<String, String> map,  boolean encodeValue) {
        StringBuilder builder = new StringBuilder();

        List<Map.Entry<String, String>> list = new ArrayList<Map.Entry<String, String>>(map.entrySet());

        //sort ascending order by key
        Collections.sort(list, new Comparator<Map.Entry<String, String>>() {
            public int compare(Map.Entry<String, String> o1, Map.Entry<String, String> o2) {
                return (o1.getKey()).toString().compareTo(o2.getKey());
            }
        });

        for (int i = 0; i < list.size(); i++) {
            String key = list.get(i).getKey();
            String val = list.get(i).getValue();

            if (builder.length() > 0)
                builder.append("&");

            if (encodeValue) {
                builder.append(key + "=" + getURLEncodedValue(val));
            }else {
                builder.append(key + "=" + val);
            }
        }

        return builder.toString();
    }

    private static String getSignatureString(Map <String, String> map, String secretKey) {
        String str = "GET" + TX_IOTCLOUD_URL + getParameterString(map, false);

        String sss = HMACSHA1.getSignature(str.getBytes(), secretKey.getBytes());

        return getURLEncodedValue(sss);
    }


    private static String getURLEncodedValue(String str) {
        try {
            String sss = java.net.URLEncoder.encode(str, "utf-8");
            return sss;
        }catch (Exception e) {
        }
        return str;
    }

    private static void putCommons(Request request, String secretId, String region) {
        request.put("SecretId", secretId);
        request.put("Timestamp", String.valueOf(System.currentTimeMillis()/1000));
        request.put("Nonce", String.valueOf((int)(Math.random() * Integer.MAX_VALUE)));
        request.put("Region", region);
    }
}