<?php

namespace MyGreeter;

class Client
{
    public $instance;//当前类实例

    /**
     * Client constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param string $timestamp 随机指定时间戳，默认当前时间戳
     * @return string 返回问候语
     */
    public function getGreeting($timestamp = '')
    {
        //当前时间
        $time = $this->isTimestamp($timestamp);
        //早上好开始时间
        $good_morning_start_time = strtotime(date('Y-m-d', $time));
        //下午好开始时间
        $good_afternoon_start_time = strtotime(date('Y-m-d 12:00:00', $time));
        //晚上好开始时间
        $good_evening_start_time = strtotime(date('Y-m-d 18:00:00', $time));
        if ($time >= $good_morning_start_time && $time < $good_afternoon_start_time) {
            return 'Good morning';
        }
        if ($time >= $good_afternoon_start_time && $time < $good_evening_start_time) {
            return 'Good afternoon';
        }
        return 'Good evening';
    }

    /**
     * 验证是否是时间戳
     *
     * @param $timestamp
     * @return int
     */
    public function isTimestamp($timestamp)
    {
        if (empty($timestamp) || strtotime(date('Y-m-d H:i:s', $timestamp)) != $timestamp) {
            return time();
        }
        return $timestamp;
    }
}