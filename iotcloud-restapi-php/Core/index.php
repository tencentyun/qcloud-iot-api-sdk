<?php
//Exception
require_once __DIR__.'/src/IoTCloud/Exception/ClientException.php';
require_once __DIR__.'/src/IoTCloud/Exception/IllegalArgumentException.php';
//Http
require_once __DIR__.'/src/IoTCloud/Http/HttpClient.php';
//Model
require_once __DIR__.'/src/IoTCloud/Model/CreateDeviceInfo.php';
require_once __DIR__.'/src/IoTCloud/Model/DeviceInfo.php';
require_once __DIR__.'/src/IoTCloud/Model/ProductInfo.php';
require_once __DIR__.'/src/IoTCloud/Model/ProductMetadata.php';
require_once __DIR__.'/src/IoTCloud/Model/ProductProperties.php';
//Request
require_once __DIR__.'/src/IoTCloud/Request/BaseRequest.php';
require_once __DIR__.'/src/IoTCloud/Request/CreateDeviceRequest.php';
require_once __DIR__.'/src/IoTCloud/Request/CreateMultiDeviceRequest.php';
require_once __DIR__.'/src/IoTCloud/Request/CreateProductRequest.php';
require_once __DIR__.'/src/IoTCloud/Request/DeleteDeviceRequest.php';
require_once __DIR__.'/src/IoTCloud/Request/DeleteProductRequest.php';
require_once __DIR__.'/src/IoTCloud/Request/GetCreateMultiDevTaskRequest.php';
require_once __DIR__.'/src/IoTCloud/Request/GetDeviceShadowRequest.php';
require_once __DIR__.'/src/IoTCloud/Request/GetMultiDevicesRequest.php';
require_once __DIR__.'/src/IoTCloud/Request/ListDevicesRequest.php';
require_once __DIR__.'/src/IoTCloud/Request/ListProductsRequest.php';
require_once __DIR__.'/src/IoTCloud/Request/PublishRequest.php';
require_once __DIR__.'/src/IoTCloud/Request/UpdateDeviceShadowRequest.php';
//Response
require_once __DIR__.'/src/IoTCloud/Response/BaseResponse.php';
require_once __DIR__.'/src/IoTCloud/Response/CreateDeviceResponse.php';
require_once __DIR__.'/src/IoTCloud/Response/CreateMultiDeviceResponse.php';
require_once __DIR__.'/src/IoTCloud/Response/CreateProductResponse.php';
require_once __DIR__.'/src/IoTCloud/Response/DeleteDeviceResponse.php';
require_once __DIR__.'/src/IoTCloud/Response/DeleteProductResponse.php';
require_once __DIR__.'/src/IoTCloud/Response/GetCreateMultiDevTaskResponse.php';
require_once __DIR__.'/src/IoTCloud/Response/GetDeviceShadowResponse.php';
require_once __DIR__.'/src/IoTCloud/Response/GetMultiDevicesResponse.php';
require_once __DIR__.'/src/IoTCloud/Response/ListDevicesResponse.php';
require_once __DIR__.'/src/IoTCloud/Response/ListProductsResponse.php';
require_once __DIR__.'/src/IoTCloud/Response/PublishResponse.php';
require_once __DIR__.'/src/IoTCloud/Response/UpdateDeviceShadowResponse.php';
//Services
require_once __DIR__.'/src/IoTCloud/Services/RequestHandler.php';
require_once __DIR__.'/src/IoTCloud/Services/ResponseHandler.php';
require_once __DIR__.'/src/IoTCloud/Services/TXIoTCloudClient.php';