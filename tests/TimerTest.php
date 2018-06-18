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

        $result = $timer->end('test');

        $this->assertArrayHasKey('test', $result);
        $this->assertEquals(2, $result['test']['seconds']);
    }

    /** @test */
    public function it_can_handle_multiples_timers()
    {
        $timer1 = Timer::start('test');
        $timer2 = Timer::start('test2');

        sleep(2);

        $result1 = $timer1->end('test');

        sleep(2);

        $result2 = $timer2->end('test2');

        $this->assertArrayHasKey('test', $result1);
        $this->assertEquals(2, $result1['test']['seconds']);

        $this->assertArrayHasKey('test2', $result2);
        $this->assertEquals(4, $result2['test2']['seconds']);
    }
}
