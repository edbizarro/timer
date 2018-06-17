<p align="center">
    <img src="https://raw.githubusercontent.com/edbizarro/timer/master/stopwatch.png">
</p>
<p align="center" style="margin: 30px 0 35px;">Timer - measure execution time of your code</p>


---

Here are a few examples on how you can use the package:

```php
use Edbizarro\Timer\Timer;

$timer = Timer::start('timer01');
sleep(1);
$result = $timer->stop();

echo $result['seconds'] // 1

// You can start multiples timers

Timer::start('timer01');
Timer::start('timer02');

sleep(1);
$result01 = Timer::stop('timer01');
echo $result['seconds'] // 1

sleep(9);
$result02 = Timer::stop('timer02');
echo $result['seconds'] // 10

```
