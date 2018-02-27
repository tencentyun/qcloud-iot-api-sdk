#!/usr/bin/python
# -*- coding: utf-8 -*-

import unittest
import time
import json
from RestAPI.iotcloud import IoTCloud

globleProductID = None
globleTaskID = None
globleVersion = None

region = 'gz'  # 目前只能填写gz
secretId = 'INPUT_YOUR_SECRET_ID_HERE'
secretkey = 'INPUT_YOUR_SECRET_KEY_HERE'


def get_value_from_json_string(jsonString, key):
    jsonRespone = json.loads(jsonString.encode('utf-8'))
    return jsonRespone[key]


class DemoTest(unittest.TestCase):
    deviceName = 'device0'
    newProductName = 'NEWPRODUCT1'

    def setUp(self):
        self.iotCloud = IoTCloud(region, secretId, secretkey)

    def tearDown(self):
        pass

    def test_create_product(self):
        response = self.iotCloud.create_product(self.newProductName)
        globals()['globleProductID'] = get_value_from_json_string(
            response, 'productID')
        code = get_value_from_json_string(response, 'code')
        self.assertEquals(code, 0)

    def test_list_products(self):
        response = self.iotCloud.list_products(1, 10)
        code = get_value_from_json_string(response, 'code')
        self.assertEquals(code, 0)

    def test_create_device(self):
        response = self.iotCloud.create_device(globleProductID, 'device0')
        code = get_value_from_json_string(response, 'code')
        self.assertEquals(code, 0)

    def test_create_multi_devices(self):
        response = self.iotCloud.create_multi_devices(
            globleProductID, ['device1', 'device2', 'device3'])
        globals()['globleTaskID'] = get_value_from_json_string(
            response, 'taskID')
        code = get_value_from_json_string(response, 'code')
        self.assertEquals(code, 0)

    def test_get_create_multi_devtask(self):
        response = self.iotCloud.get_create_multi_devtask(
            globleProductID, globleTaskID)
        code = get_value_from_json_string(response, 'code')
        self.assertEquals(code, 0)

    def test_get_multi_devices(self):
        print('\nWait for create task state...\n')
        time.sleep(10)
        print('\nFinish create task!\n')
        response = self.iotCloud.get_multi_devices(
            globleProductID, globleTaskID, 1, 10)
        code = get_value_from_json_string(response, 'code')
        self.assertEquals(code, 0)

    def test_list_devices(self):
        response = self.iotCloud.list_devices(globleProductID, 1, 10)
        code = get_value_from_json_string(response, 'code')
        self.assertEquals(code, 0)

    def test_publish(self):
        topic = globleProductID + '/' + self.deviceName + "/event"
        response = self.iotCloud.publish(
            topic, 'hello', globleProductID, self.deviceName)
        code = get_value_from_json_string(response, 'code')
        self.assertEquals(code, 0)

    def test_get_device_shadow(self):
        response = self.iotCloud.get_device_shadow(
            globleProductID, self.deviceName)
        globals()['globleVersion'] = get_value_from_json_string(
            response, 'code')
        code = get_value_from_json_string(response, 'code')
        self.assertEquals(code, 0)

    def test_update_device_shadow(self):
        desireString = '{"desired" : {"color": '
        desireString += '"red"'
        desireString += '}}'

        response = self.iotCloud.update_device_shadow(
            globleProductID, self.deviceName, globleVersion, desireString)
        code = get_value_from_json_string(response, 'code')
        self.assertEquals(code, 0)

    def test_delete_devices(self):
        response = self.iotCloud.delete_device(globleProductID, 'device0')
        code = get_value_from_json_string(response, 'code')
        self.assertEquals(code, 0)

        response = self.iotCloud.delete_device(globleProductID, 'device1')
        code = get_value_from_json_string(response, 'code')
        self.assertEquals(code, 0)

        response = self.iotCloud.delete_device(globleProductID, 'device2')
        code = get_value_from_json_string(response, 'code')
        self.assertEquals(code, 0)

        response = self.iotCloud.delete_device(globleProductID, 'device3')
        code = get_value_from_json_string(response, 'code')
        self.assertEquals(code, 0)

    def test_delete_product(self):
        response = self.iotCloud.delete_product(globleProductID)
        code = get_value_from_json_string(response, 'code')
        self.assertEquals(code, 0)


if __name__ == '__main__':
    suite = unittest.TestSuite()
    tests = [DemoTest("test_create_product"),
             DemoTest("test_list_products"),
             DemoTest("test_create_device"),
             DemoTest("test_create_multi_devices"),
             DemoTest("test_get_create_multi_devtask"),
             DemoTest("test_get_multi_devices"),
             DemoTest("test_list_devices"),
             DemoTest("test_publish"),
             DemoTest("test_get_device_shadow"),
             DemoTest("test_update_device_shadow"),
             DemoTest("test_delete_devices"),
             DemoTest("test_delete_product")             ]
    suite.addTests(tests)
    runner = unittest.TextTestRunner(verbosity=2)
    runner.run(suite)
