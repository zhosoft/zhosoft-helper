<?php

/**
 * Created by PhpStorm.
 * User: by zxm(zhosoft@foxmail.com)
 * Date: 2019/5/14 15:00
 */

namespace Zhosoft;

class Logger
{
    public $appPath = '';//日志文件目录
    public $fileName = '';//日志文件名称
    public $postfix = 'txt';//日志文件后缀
    const DIR_PERMISSION = '0775';//目录权限
    const DEFAULT_APPPATH = '/../application/';//默认日志文件目录

    /**
     * @param $data 要写入的数据 string|array|object
     * @param $dataTag 要写入数据的描述
     * @param string $appPath 日志文件路径
     * @param string $fileName 日志文件名称
     * @param string $postfix 日志文件后缀
     */
    public static function writeStyle($dataTag, $data, $fileName = '', $appPath = self::DEFAULT_APPPATH, $postfix = 'txt')
    {
        //定义日志记录的目录
        $basePath = $_SERVER['DOCUMENT_ROOT'];
        $path = $basePath . DIRECTORY_SEPARATOR . $appPath . "log" . DIRECTORY_SEPARATOR . date("Ym") . DIRECTORY_SEPARATOR;
        if (!empty($fileName)) {
            $fileName = '-' . $fileName;
        }
        $destination = $path . date("d") . $fileName . '-log' . '.' . $postfix;
        $path = dirname($destination);
        !is_dir($path) && mkdir($path, self::DIR_PERMISSION, true);
        file_put_contents($destination, '---------------------------------------------------------------' . PHP_EOL . date('Y-m-d H:i:s') . PHP_EOL . $dataTag . ":" . PHP_EOL . print_r($data, true) . PHP_EOL, FILE_APPEND);
    }

    /**
     * 记录日志,需要实例化后才可以使用
     * @param $data 要写入的数据 string|array|object
     * @param $dataTag 要写入数据的描述
     */
    public function writeStyle2($dataTag, $data)
    {
        //定义日志记录的目录
        $basePath = $_SERVER['DOCUMENT_ROOT'];
        $path = $basePath . DIRECTORY_SEPARATOR . $this->appPath . "log" . DIRECTORY_SEPARATOR . date("Ym") . DIRECTORY_SEPARATOR;
        if (!empty($this->fileName)) {
            $this->fileName = '-' . $this->fileName;
        }
        $destination = $path . date("d") . $this->fileName . '-log' . '.' . $this->postfix;
        $path = dirname($destination);
        !is_dir($path) && mkdir($path, self::DIR_PERMISSION, true);
        file_put_contents($destination, '---------------------------------------------------------------' . PHP_EOL . date('Y-m-d H:i:s') . PHP_EOL . $dataTag . ":" . PHP_EOL . print_r($data, true) . PHP_EOL, FILE_APPEND);
    }
}