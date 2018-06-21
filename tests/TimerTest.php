<?php

namespace Edbizarro\Timer\Tests;

use Edbizarro\Timer\Timer;
use Edbizarro\Timer\TimerMetrics;

class TimerTest extends \Orchestra\Testbench\TestCase
{
    /** @test */
    public function it_can_create_with_key()
    {
        $timer = Timer::start('test');
        $this->assertInstanceOf(TimerMetrics::class, $timer);
        sleep(2);
        $result = $timer->stop();

        $this->assertEquals(2, $result['seconds']);
    }

    /** @test */
    public function it_can_handle_multiples_timers()
    {
        $timer1 = Timer::start('test');
        $timer2 = Timer::start('test2');
        
        sleep(2);

        $result1 = $timer1->stop();

        sleep(2);

        $result2 = $timer2->stop();

        $this->assertEquals(2, $result1['seconds']);

        $this->assertEquals(4, $result2['seconds']);
    }
}
