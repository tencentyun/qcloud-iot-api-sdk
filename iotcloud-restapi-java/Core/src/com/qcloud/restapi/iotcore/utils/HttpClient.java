package com.qcloud.restapi.iotcore.utils;

import javax.net.ssl.HttpsURLConnection;
import javax.net.ssl.SSLContext;
import javax.net.ssl.SSLSocketFactory;
import javax.net.ssl.TrustManager;
import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.URL;


/**
 * http客户端
 * 
 */
public class HttpClient {
    /**
     * HTTP GET方法
     */
    public static final String METHOD_GET = "GET";

    /**
     * HTTP连接超时，单位：毫秒
     */
    public static final int DEFAULT_CONNECT_TIMEOUT = 30 * 1000;

    /**
     * HTTP读超时，单位：毫秒
     */
    public static final int DEFAULT_READ_TIMEOUT = 30 * 1000;

    /**
     * HTTP响应代码
     */
    public static final int RESPONSE_CODE_OK = 200;

    /**
     * 处理https GET/POST请求
     *
     * @param requestUrl 请求地址
     * @param requestMethod 请求方法(GET/POST)
     * @param outputStr 输出内容
     * @return 应答字符串
     */
    public static String httpsRequest(String requestUrl, String requestMethod, String outputStr) {
        return httpsRequest(requestUrl, requestMethod, outputStr, DEFAULT_CONNECT_TIMEOUT, DEFAULT_READ_TIMEOUT);
    }

    /**
     * 处理https GET/POST请求
     *
     * @param requestUrl 请求地址
     * @param requestMethod 请求方法(GET/POST)
     * @param outputStr POST参数
     * @param connectTimeout 连接超时（毫秒）
     * @param readTimeout 读数据超时（毫秒）
     * @return 应答字符串。为空串（或null)时，表示请求失败（或超时）。
     */
    public static String httpsRequest(String requestUrl, String requestMethod, String outputStr, int connectTimeout, int readTimeout) {
        StringBuffer buffer = new StringBuffer();

        try {
            SSLContext sslContext = SSLContext.getInstance("SSL");
            TrustManager[] tm = {new IotCloudX509TrustManager()};
            sslContext.init(null, tm, new java.security.SecureRandom());

            SSLSocketFactory ssf = sslContext.getSocketFactory();

            URL url = new URL(requestUrl);

            HttpsURLConnection conn = (HttpsURLConnection) url.openConnection();

            conn.setDoOutput(true);
            conn.setDoInput(true);
            conn.setUseCaches(false);
            conn.setRequestMethod(requestMethod);
            conn.setConnectTimeout(connectTimeout);
            conn.setReadTimeout(readTimeout);
            conn.setSSLSocketFactory(ssf);

            conn.connect();

            if (null != outputStr) {
                OutputStream os = conn.getOutputStream();
                os.write(outputStr.getBytes("utf-8"));
                os.close();
            }

            int responseCode = conn.getResponseCode();

            if (responseCode == RESPONSE_CODE_OK) {
                BufferedReader br = new BufferedReader(new InputStreamReader(conn.getInputStream(), "utf-8"));

                String line = null;
                while ((line = br.readLine()) != null) {
                    buffer.append(line);
                }

                br.close();
            }
        } catch (Exception e) {
            e.printStackTrace();
        }

        return buffer.toString();
    }
}
