<?php
/**
 * Created by PhpStorm.
 * User: by zxm(zhosoft@foxmail.com)
 * CustomDate: 2019/5/16 10:47
 */

namespace zhosoft\date;
date_default_timezone_set('asia/shanghai');//设置时区

class CustomDate
{

    /**
     * 获取指定日期所在月份的第一天 返回的格式有两种，根据第二个参数的传值来决定
     * @param $date 传时间戳格式
     * @param string $format format-格式化 timestamp-时间戳
     * @return false|int|string
     */
    public static function firstDay($date, $format = 'format')
    {
        if ($format == 'format') {
            $result = date('Y-m-01', $date);
        } else if ($format == 'timestamp') {
            $result = strtotime(date('Y-m-01 00:00:00', $date));
        }
        return $result;
    }

    /**
     * 获取指定日期所在月份的第后一天 返回的格式有两种，根据第二个参数的传值来决定
     * @param $date 传时间戳格式
     * @param string $format format-格式化 timestamp-时间戳
     * @return false|int|string
     */
    public static function lastDay($date, $format = 'format')
    {
        $_date = strtotime(date('Y-m-01', $date) . '+1 month -1 day');
        if ($format == 'format') {
            $result = date('Y-m-d', $_date);
        } else if ($format == 'timestamp') {
            $result = strtotime(date('Y-m-d 23:59:59', $_date));
        }
        return $result;
    }

    /**
     * 获取指定日期的年份
     * @param $timestamp
     * @return bool|false|string
     */
    public static function getYear($timestamp)
    {
        if (strlen($timestamp) == '10') {
            return date('Y', $timestamp);
        } else {
            return false;
        };
    }

    /**
     * 获取指定日期的月份
     * @param $timestamp
     * @return bool|false|string
     */
    public static function getMonth($timestamp)
    {
        if (strlen($timestamp) == '10') {
            return date('m', $timestamp);
        } else {
            return false;
        };
    }

    /**
     * 获取指定日期的天
     * @param $timestamp
     * @return bool|false|string
     */
    public static function getDay($timestamp)
    {
        if (strlen($timestamp) == '10') {
            return date('d', $timestamp);
        } else {
            return false;
        };
    }
}