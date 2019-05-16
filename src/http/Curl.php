<?php

/**
 * Created by PhpStorm.
 * User: by zxm(zhosoft@foxmail.com)
 * CustomDate: 2019/5/16 10:34
 */

namespace zhosoft\http;
class Curl
{
    /**
     * @param $data send的数据
     * @param $url  send的URL
     * @return bool|string
     */
    public static function send($data, $url)
    {
        $ch = curl_init(); //初始化curl
        curl_setopt($ch, CURLOPT_URL, $url); //抓取指定网页
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1); //post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch); //运行curl
        curl_close($ch);
        return $result;
    }
}