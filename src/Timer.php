<?php

namespace Edbizarro\Timer;

class Timer
{
    public static function __callStatic($method, $args)
    {
        return TimerMetrics::init()->{$method}(...$args);
    }
}

class TimerMetrics
{
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
    public static function init(): TimerMetrics
    {
        return new self();
    }

    public function start($key)
    {
        $this->timerKey = $key;
        $this->measurements[$key] = microtime(true);

        return $this;
    }

    public function stop(): array
    {
        return $this->report();
    }

    protected function report(): array
    {
        $end = microtime(true);
        $start = $this->measurements[$this->timerKey];

        $duration = $end-$start;
        $hours = (int) ($duration/60/60);
        $minutes = (int) ($duration/60)-$hours*60;
        $seconds = (int) $duration-$hours*60*60-$minutes*60;

        return $this->results = [
            'start' => $start,
            'end' => $end,
            'duration' => $duration,
            'milliseconds' => $duration * 1000,
            'seconds' => $seconds,
            'minutes' => $minutes,
            'hours' => $hours,
        ];
    }
}
