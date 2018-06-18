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
        return new self();
    }

    public function start($key)
    {
        $this->timerKey = $key;
        $this->measurements[$key] = Carbon::create()->getTimestamp();

        return $this;
    }

    public function stop()
    {
        $time = Carbon::create()->getTimestamp();

        return $this->report($time);
    }

    protected function report($time): array
    {
        $end = Carbon::createFromTimestamp($time);
        $start = Carbon::createFromTimestamp($this->measurements[$this->timerKey]);

        return $this->results = [
            'start' => $start->timestamp,
            'end' => $end->timestamp,
            'seconds' => $end->diffInRealSeconds($start),
            'minutes' => $end->diffInRealMinutes($start),
            'hours' => $end->diffInRealHours($start),
        ];
    }
}
