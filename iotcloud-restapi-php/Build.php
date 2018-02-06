<?php

$phar = new Phar('TXIoTCloud.phar', 0, 'TXIoTCloud.phar');
// 添加Core目录下所有文件到TXIoTCloud.phar归档文件
$phar->buildFromDirectory(dirname(__FILE__) . '/Core');