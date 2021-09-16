# Scheduler
Schedule events with this framework-agnostic cron scheduler, which can be easily integrated into your existing project or run as a standalone command scheduler.

## License
Licensed under MIT. Totally free for private or commercial projects.

## Installation
```text
composer require andrewdyer/scheduler
```

## Usage
```php
// SendReminderEvent.php
namespace App\Events;

use Anddye\Scheduler\Event;

class SendReminderEvent extends Event
{
    public function handle(): void
    {
        // TODO: Send reminder to user somehow
    }
}
```

```php
// index.php
$scheduler = new Anddye\Scheduler\Scheduler();

// At every 45th minute, run the send reminder event.
$scheduler->addEvent(new App\Events\SendReminderEvent())->setExpression('*/45 * * * *');

// add more events ...

$scheduler->run();
```

### Event Frequencies
| Helper Method | Runs... | Example |
| --- | --- | --- |
| daily()| At 00:00 | `$scheduler->addEvent($event)->daily()` |
| dailyAt(int $hour, int $minute)| At a specific hour and minute | `$scheduler->addEvent($event)->dailyAt(12, 30)` |
| dailyTwice(int $firstHour, int $lastHour) | At minute 0 past two specific hours | `$scheduler->addEvent($event)->dailyTwice(11, 23)` |
| mondays() | At every minute on Monday | `$scheduler->addEvent($event)->monday()` |
| tuesdays() | At every minute on Tuesday | `$scheduler->addEvent($event)->tuesdays()` |
| wednesdays() | At every minute on Wednesday | `$scheduler->addEvent($event)->wednesdays()` |
| thursdays() | At every minute on Thursday | `$scheduler->addEvent($event)->thursdays()` |
| fridays() | At every minute on Friday | `$scheduler->addEvent($event)->fridays()` |
| saturdays() | At every minute on Saturday | `$scheduler->addEvent($event)->saturdays()` |
| sundays() | At every minute on Sunday | `$scheduler->addEvent($event)->sundays()` |
| weekdays() | At every minute on Monday, Tuesday, Wednesday, Thursday, and Friday | `$scheduler->addEvent($event)->weekdays()` |
| weekends() | At every minute on Saturday and Sunday | `$scheduler->addEvent($event)->weekends()` |
| days(int ...$days) | At every minute on specific days | `$scheduler->addEvent($event)->days(2, 4, 6)` |
| everyMinute() | At every minute | `$scheduler->addEvent($event)->everyMinute()` |
| everyFiveMinutes() | At every 5th minute | `$scheduler->addEvent($event)->everyFiveMinutes()` |
| everyTenMinutes() | At every 10th minute| `$scheduler->addEvent($event)->everyTenMinutes()` |
| everyFifteenMinutes() | At every 15th minute | `$scheduler->addEvent($event)->everyFifteenMinutes()` |
| everyThirtyMinutes() | At every 30th minute | `$scheduler->addEvent($event)->everyThirtyMinutes()` |
| hourly() | At minute 1 | `$scheduler->addEvent($event)->hourly()` |
| hourlyAt(int $minute) | At a specific minute | `$scheduler->addEvent($event)->hourlyAt()` |
| monthly() | At 00:00 on day-of-month 1 | `$scheduler->addEvent($event)->monthly()` |
| monthlyOn(int $day) | At 00:00 on a specific day-of-month | `$scheduler->addEvent($event)->monthlyOn(4)` |
| on(int $day) | At every minute on a specific day-of-month | `$scheduler->addEvent($event)->on(1)` |

### Combining Event Frequencies
```php
// At minute 0 past hour 2 and 14 on Monday
$scheduler->addEvent(new App\Events\SendReminderEvent())->dailyTwice(2, 14)->mondays();
```

```php
// At every 15th minute on Friday
$scheduler->addEvent(new App\Events\SendReminderEvent())->everyFifteenMinutes()->fridays();
```

```php
// At every minute on Tuesday, Thursday, and Saturday
$scheduler->addEvent(new App\Events\SendReminderEvent())->everyMinute()->days(2, 4, 6);
```

```php
// At minute 45 on Monday, Tuesday, Wednesday, Thursday, and Friday
$scheduler->addEvent(new App\Events\SendReminderEvent())->hourlyAt(45)->weekdays();
```
