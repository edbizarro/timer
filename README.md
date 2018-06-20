<p align="center">
    <img src="https://raw.githubusercontent.com/edbizarro/timer/master/stopwatch.png">
</p>
<p align="center" style="margin: 30px 0 35px;">Timer - measure execution time of your code</p>


---

Here are a few examples on how you can use the package:

```php
use Edbizarro\Timer\Timer;

$timer = Timer::start('timer01');
sleep(2);
$result = $timer->stop();

print_r($result);

// array:7 [                                                                                                                                                                                                
//   "start" => 1529506852.084                                                                                                                                                                              
//   "end" => 1529506854.0855                                                                                                                                                                               
//   "duration" => 2.0015239715576                                                                                                                                                                          
//   "milliseconds" => 2001.5239715576                                                                                                                                                                      
//   "seconds" => 2                                                                                                                                                                                         
//   "minutes" => 0                                                                                                                                                                                         
//   "hours" => 0                                                                                                                                                                                           
// ]    
```

## Installation

You can install the package via composer:

``` bash
composer require edbizarro/timer
```

---

[![forthebadge](http://forthebadge.com/images/badges/contains-cat-gifs.svg)](http://forthebadge.com)
