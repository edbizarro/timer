<?php

namespace Edbizarro\Timer\Tests;

use Edbizarro\Timer\Timer;
use Edbizarro\Timer\TimerMetrics;
use PHPUnit\Framework\TestCase;

class TimerTest extends TestCase
{
    /** @test */
    public function it_can_create_with_key()
    {
        $timer = Timer::start('test');

        $this->assertInstanceOf(TimerMetrics::class, $timer);

        sleep(2);

        $result = $timer->end($test);

        $this->assertArrayHasKey('test', $result);
        $this->assertEquals(2, $result['test']['seconds']);
    }
}
