<?php
/**
 * Created by czz.
 * User: czz
 * Date: 2020/5/6
 * Time: 15:37
 */

namespace App\Services\Schedule;

use Illuminate\Console\Scheduling\Schedule;

class ScheduleService
{
    public static $call_tasks = [];

    public static $command_tasks = [];

    public static $jobs_tasks = [];

    /**
     * 初始化 - 开启计划任务
     *
     * @param Schedule $schedule
     *
     * @return void
     */
    public static function boot(Schedule $schedule)
    {
        // 注册任务
        self::register();

        // 定义Schedule事件
        self::define($schedule);
    }

    /**
     * 注册相关任务
     * 注册规则: 1>在本类中声明相关方法定义定时任务逻辑; 2>将方法名添加到对应的数组中;
     *
     * @return void
     */
    public static function register()
    {
        self::$call_tasks = [

        ];

        self::$command_tasks = [
            'inspire'
        ];

        self::$jobs_tasks = [

        ];
    }

    /**
     * 声明
     *
     * @param Schedule $schedule
     *
     * @return void
     */
    public static function define(Schedule $schedule)
    {
        // call
        if (!empty(self::$call_tasks)) {
            foreach (self::$call_tasks as $v)
                call_user_func([self::class, $v], $schedule);
        }

        // command
        if (!empty(self::$command_tasks)) {
            foreach (self::$command_tasks as $v)
                call_user_func([self::class, $v], $schedule);
        }

        // jobs
        if (!empty(self::$jobs_tasks)) {
            foreach (self::$jobs_tasks as $v)
                call_user_func([self::class, $v], $schedule);
        }
    }

    /**
     * @param Schedule $schedule
     */
    public static function inspire(Schedule $schedule) {
        $schedule->command('inspire')->everyMinute();
    }
}
