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

print_r($result);

// [test] => Array
// (
//     [start] => (timestamp)
//     [end] => (timestamp)
//     [seconds] => 2
//     [minutes] => 0
//     [hours] => 0
// )


// You can start multiples timers

$timer1 = Timer::start('timer01');
$timer2 = Timer::start('timer02');

sleep(1);
$result01 = $timer1->stop('timer01');
echo $result['seconds'] // 1

sleep(9);
$result02 = $timer2->stop('timer02');
echo $result02['seconds'] // 10

```

## Installation

You can install the package via composer:

``` bash
composer require edbizarro/timer
```

---

[![forthebadge](http://forthebadge.com/images/badges/contains-cat-gifs.svg)](http://forthebadge.com)
