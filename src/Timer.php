<?php

namespace Edbizarro\Timer;

use Carbon\Carbon;

class Timer
{
    public static function __callStatic($method, $args)
    {
        return TimerMetrics::init()->{$method}(...$args);
    }
}

class TimerMetrics
{
    protected $cacheDriver;

    /**
     * @var
     */
    protected $timerKey;

    /**
     * @var array
     */
    protected $measurements = [];

    /**
     * @var array
     */
    protected $results = [];

    /**
     * @return TimerMetrics
     */
    public static function init()
    {
        return new static();
    }

    public function start($key)
    {
        $this->timerKey = $key;
        $this->measurements[$key] = Carbon::create()->getTimestamp();

        return $this;
    }

    public function end($key = null)
    {
        $time = Carbon::create()->getTimestamp();

        if ($key === null) {
            $key = $this->timerKey;
        }

        return $this->report($time, $key);
    }

    protected function report($time, $key): array
    {
        $end = Carbon::createFromTimestamp($time);
        $start = Carbon::createFromTimestamp($this->measurements[$key]);

        return $this->results = [
            $key => [
                'start' => $start->timestamp,
                'end' => $end->timestamp,
                'seconds' => $end->diffInRealSeconds($start),
                'minutes' => $end->diffInRealMinutes($start),
                'hours' => $end->diffInRealHours($start),
            ]
        ];
    }
}
