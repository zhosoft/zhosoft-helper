<?php

/**
 * Created by PhpStorm.
 * User: by zxm(zhosoft@foxmail.com)
 * Date: 2019/5/14 15:00
 */

namespace Logger;

class Logger
{

    public $appPath;

    /**
     * @param $data 要写入的数据 string|array|object
     * @param $dataTag 要写入数据的描述
     * @param $appPath 要写入日子日志的路径
     * @param string $fileName 日志文件名称
     */
    public function write($data, $dataTag, $appPath, $fileName = '', $postfix = 'txt')
    {
        //定义日志记录的目录
        $path = $appPath . "log" . DIRECTORY_SEPARATOR . date("Ym") . DIRECTORY_SEPARATOR;
        if (!empty($fileName)) {
            $fileName = '-' . $fileName;
        }
        $destination = $path . date("d") . $fileName . '-log' . '.' . $postfix;
        $path = dirname($destination);
        !is_dir($path) && mkdir($path, 0755, true);
        file_put_contents($destination, date('Y-m-d H:i:s') . PHP_EOL . $dataTag . ":" . PHP_EOL . print_r($data, true) . PHP_EOL, FILE_APPEND);
    }
}