<?php

/**
 * Created by PhpStorm.
 * User: by zxm(zhosoft@foxmail.com)
 * Date: 2019/5/14 15:00
 */

namespace Logger;

class Logger
{

    public function index($data, $variate, $appPath, $fileName = '')
    {
        //定义日志记录的目录
        $path = $appPath . "log" . DIRECTORY_SEPARATOR . date("Ym") . DIRECTORY_SEPARATOR;
        if (!empty($fileName)) {
            $fileName = '-' . $fileName;
        }
        $destination = $path . date("d") . $fileName . '-log' . '.txt';
        $path = dirname($destination);
        !is_dir($path) && mkdir($path, 0755, true);
        file_put_contents($destination, date('Y-m-d H:i:s') . PHP_EOL . $variate . ":" . PHP_EOL . print_r($data, true) . PHP_EOL, FILE_APPEND);
    }
}