<?php

namespace TXIoTCloud\Services;

use TXIoTCloud\Model\ProductInfo;
use TXIoTCloud\Model\ProductMetadata;
use TXIoTCloud\Model\ProductProperties;
use TXIoTCloud\Model\DeviceInfo;
use TXIoTCloud\Model\CreateDeviceInfo;
use TXIoTCloud\Response\BaseResponse;
use TXIoTCloud\Response\CreateMultiDeviceResponse;
use TXIoTCloud\Response\CreateProductResponse;
use TXIoTCloud\Response\CreateDeviceResponse;
use TXIoTCloud\Response\DeleteDeviceResponse;
use TXIoTCloud\Response\DeleteProductResponse;
use TXIoTCloud\Response\GetCreateMultiDevTaskResponse;
use TXIoTCloud\Response\GetDeviceShadowResponse;
use TXIoTCloud\Response\GetMultiDevicesResponse;
use TXIoTCloud\Response\ListDevicesResponse;
use TXIoTCloud\Response\ListProductsResponse;
use TXIoTCloud\Response\PublishResponse;
use TXIoTCloud\Response\UpdateDeviceShadowResponse;

class ResponseHandler
{

    /**
     * 解析响应
     * @param $action
     * @param $response
     * @return CreateProductResponse|GetMultiDevicesResponse|PublishResponse|void
     */
    public static function parseResponse($action, $response)
    {
        switch ($action) {
            case CREATE_PRODUCT:
                return self::parseCreateProductResponse($response);

            case DELETE_PRODUCT:
                $deleteProductResponse = new DeleteProductResponse();
                self::parseCommonResponse($deleteProductResponse, $response);
                return $deleteProductResponse;

            case CREATE_DEVICE:
                return self::parseCreateDeviceProductResponse($response);

            case DELETE_DEVICE:
                $deleteDeviceResponse = new DeleteDeviceResponse();
                self::parseCommonResponse($deleteDeviceResponse, $response);
                return $deleteDeviceResponse;

            case GET_DEVICE_SHADOW:
            case UPDATE_DEVICE_SHADOW:
                return self::parseDeviceShadowResponse($action, $response);

            case LIST_DEVICES:
                return self::parseListDevicesResponse($response);

            case LIST_PRODUCTS:
                return self::parseListProductsResponse($response);

            case CREATE_MULTI_DEVICE:
                return self::parseCreateMultiDeviceResponse($response);

            case GET_CREATE_MULTI_DEV_TASK:
                return self::parseGetCreateMultiDevTaskResponse($response);

            case GET_MULTI_DEVICES:
                return self::parseGetMultiDevicesResponse($response);

            case PUBLISH:
                $publishResponse = new PublishResponse();
                self::parseCommonResponse($publishResponse, $response);
                return $publishResponse;

            default:
                $code = 0;
                $message = "";
                $codeDesc = "Success";
                $baseResponse = new BaseResponse($code, $message, $codeDesc);
                return self::parseCommonResponse($baseResponse, $response);
        }
    }

    /**
     * 解析创建产品响应
     * @param $response
     * @return CreateProductResponse
     */
    private static function parseCreateProductResponse($response)
    {
        $responseJsonStr = json_decode($response, true);

        $createProductResponse = new CreateProductResponse();

        self::parseCommonResponse($createProductResponse, $response);

        if (isset($responseJsonStr['productName'])) {
            $createProductResponse->setProductName($responseJsonStr['productName']);
        }

        if (isset($responseJsonStr['productID'])) {
            $createProductResponse->setProductId($responseJsonStr['productID']);
        }

        return $createProductResponse;
    }

    /**
     * 解析创建设备响应
     * @param $response
     * @return CreateDeviceResponse
     */
    private static function parseCreateDeviceProductResponse($response)
    {
        $responseJsonStr = json_decode($response, true);

        $createDeviceResponse = new CreateDeviceResponse();

        self::parseCommonResponse($createDeviceResponse, $response);

        if (isset($responseJsonStr['deviceName'])) {
            $createDeviceResponse->setDeviceName($responseJsonStr['deviceName']);
        }

        if (isset($responseJsonStr['deviceCert'])) {
            $createDeviceResponse->setDeviceCert($responseJsonStr['deviceCert']);
        }

        if (isset($responseJsonStr['devicePrivateKey'])) {
            $createDeviceResponse->setDevicePrivateKey($responseJsonStr['devicePrivateKey']);
        }

        return $createDeviceResponse;
    }

    /**
     * 解析虚拟设备信息响应（包含查询与更新）
     * @param $action
     * @param $response
     * @return GetDeviceShadowResponse|UpdateDeviceShadowResponse|null
     */
    private static function parseDeviceShadowResponse($action, $response)
    {
        $responseJsonStr = json_decode($response, true);

        $shadowResponse = null;
        if ($action == GET_DEVICE_SHADOW) {
            $shadowResponse = new GetDeviceShadowResponse();
        } else {
            $shadowResponse = new UpdateDeviceShadowResponse();
        }

        self::parseCommonResponse($shadowResponse, $response);

        if (isset($responseJsonStr['state'])) {
            $shadowResponse->setState($responseJsonStr['state']);
        }

        if (isset($responseJsonStr['metadata'])) {
            $shadowResponse->setMetadata($responseJsonStr['metadata']);
        }

        if (isset($responseJsonStr['timestamp'])) {
            $shadowResponse->setTimestamp($responseJsonStr['timestamp']);
        }

        if (isset($responseJsonStr['version'])) {
            $shadowResponse->setVersion($responseJsonStr['version']);
        }

        return $shadowResponse;
    }

    /**
     * 解析查询物联云设备的设备列表响应
     * @param $response
     * @return ListDevicesResponse
     */
    private static function parseListDevicesResponse($response)
    {
        $responseJsonStr = json_decode($response, true);

        $listDevicesResponse = new ListDevicesResponse();

        self::parseCommonResponse($listDevicesResponse, $response);

        if (isset($responseJsonStr['totalCnt'])) {
            $listDevicesResponse->setTotalCnt($responseJsonStr['totalCnt']);
        }

        if (isset($responseJsonStr['devices'])) {
            $devices = array();
            $devicesJsonStr = $responseJsonStr['devices'];
            foreach ($devicesJsonStr as $device) {
                $deviceInfo = new DeviceInfo();
                if (isset($device['deviceName'])) {
                    $deviceInfo->setDeviceName($device['deviceName']);
                }

                if (isset($device['productID'])) {
                    $deviceInfo->setProductID($device['productID']);
                }
                $devices[] = $deviceInfo;
            }
            $listDevicesResponse->setDevices($devices);
        }

        return $listDevicesResponse;
    }

    /**
     * 解析列出产品列表响应
     * @param $response
     * @return ListProductsResponse
     */
    private static function parseListProductsResponse($response)
    {
        $responseJsonStr = json_decode($response, true);

        $listProductsResponse = new ListProductsResponse();

        self::parseCommonResponse($listProductsResponse, $response);

        if (isset($responseJsonStr['totalCnt'])) {
            $listProductsResponse->setTotalCnt($responseJsonStr['totalCnt']);
        }

        if (isset($responseJsonStr['products'])) {
            $products = array();
            $productArray = $responseJsonStr['products'];
            foreach ($productArray as $product) {
                $productInfo = new ProductInfo();
                if (isset($product['productMetadata'])) {
                    $metadata = $product['productMetadata'];
                    if (isset($metadata['creationDate'])) {
                        $productMetadata = new ProductMetadata($metadata['creationDate']);
                        $productInfo->setProductMetaData($productMetadata);
                    }
                }
                if (isset($product['productProperties'])) {
                    $properties = $product['productProperties'];
                    $productProperties = new ProductProperties();
                    if (isset($properties['productDescription'])) {
                        $productProperties->setProductDescription($properties['productDescription']);
                    }
                    if (isset($properties['encryptionType'])) {
                        $productProperties->setEncryptionType($properties['encryptionType']);
                    }
                    if (isset($properties['region'])) {
                        $productProperties->setRegion($properties['region']);
                    }
                    $productInfo->setProductProperties($productProperties);
                }
                if (isset($product['productName'])) {
                    $productInfo->setProductName($product['productName']);
                }
                if (isset($product['productID'])) {
                    $productInfo->setProductID($product['productID']);
                }
                $products[] = $productInfo;
            }
            $listProductsResponse->setProducts($products);
        }

        return $listProductsResponse;
    }

    /**
     * 解析批量创建物联云设备
     * @param $response
     * @return CreateMultiDeviceResponse
     */
    private static function parseCreateMultiDeviceResponse($response)
    {
        $responseJsonStr = json_decode($response, true);

        $createMultiDeviceResponse = new CreateMultiDeviceResponse();

        self::parseCommonResponse($createMultiDeviceResponse, $response);

        if (isset($responseJsonStr['taskID'])) {
            $createMultiDeviceResponse->setTaskID($responseJsonStr['taskID']);
        }

        return $createMultiDeviceResponse;
    }

    /**
     * 解析查询批量创建设备任务的执行状态响应
     * @param $response
     * @return GetCreateMultiDevTaskResponse
     */
    private static function parseGetCreateMultiDevTaskResponse($response)
    {
        $responseJsonStr = json_decode($response, true);

        $getCreateMultiDevTaskResponse = new GetCreateMultiDevTaskResponse();

        self::parseCommonResponse($getCreateMultiDevTaskResponse, $response);

        if (isset($responseJsonStr['taskID'])) {
            $getCreateMultiDevTaskResponse->setTaskID($responseJsonStr['taskID']);
        }

        if (isset($responseJsonStr['taskStatus'])) {
            $getCreateMultiDevTaskResponse->setTaskStatus($responseJsonStr['taskStatus']);
        }

        return $getCreateMultiDevTaskResponse;
    }

    /**
     * 解析查询批量创建设备的执行结果响应
     * @param $response
     * @return GetMultiDevicesResponse
     */
    private static function parseGetMultiDevicesResponse($response)
    {
        $responseJsonStr = json_decode($response, true);

        $getMultiDevicesResponse = new GetMultiDevicesResponse();

        self::parseCommonResponse($getMultiDevicesResponse, $response);

        if (isset($responseJsonStr['totalDevNum'])) {
            $getMultiDevicesResponse->setTotalDevNum($responseJsonStr['totalDevNum']);
        }

        if (isset($responseJsonStr['listCreateDeviceInfo'])) {
            $listCreateDeviceInfo = array();
            $createDeviceInfoList = $responseJsonStr['listCreateDeviceInfo'];
            foreach ($createDeviceInfoList as $deviceInfo) {
                $createDeviceInfo = new CreateDeviceInfo();
                if (isset($deviceInfo['deviceName'])) {
                    $createDeviceInfo->setDeviceName($deviceInfo['deviceName']);
                }
                if (isset($deviceInfo['deviceCert'])) {
                    $createDeviceInfo->setDeviceCert($deviceInfo['deviceCert']);
                }
                if (isset($deviceInfo['devicePrivateKey'])) {
                    $createDeviceInfo->setDevicePrivateKey($deviceInfo['devicePrivateKey']);
                }
                if (isset($deviceInfo['result'])) {
                    $createDeviceInfo->setResult($deviceInfo['result']);
                }
                if (isset($deviceInfo['errMsg'])) {
                    $createDeviceInfo->setErrMsg($deviceInfo['errMsg']);
                }
                $listCreateDeviceInfo[] = $createDeviceInfo;
            }
            $getMultiDevicesResponse->setListCreateDeviceInfo($listCreateDeviceInfo);
        }

        return $getMultiDevicesResponse;
    }

    /**
     * 解析通用响应信息
     * @param $baseResponse
     * @param $response
     */
    private static function parseCommonResponse(&$baseResponse, &$response)
    {
        $responseJsonStr = json_decode($response, true);

        if (isset($responseJsonStr['code'])) {
            $baseResponse->setCode($responseJsonStr['code']);
        }

        if (isset($responseJsonStr['message'])) {
            $baseResponse->setMessage($responseJsonStr['message']);
        }

        if (isset($responseJsonStr['codeDesc'])) {
            $baseResponse->setCodeDesc($responseJsonStr['codeDesc']);
        }
    }

}