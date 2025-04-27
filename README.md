![Scheduler](https://raw.githubusercontent.com/andrewdyer/public-assets/refs/heads/main/images/covers/scheduler.png)

# Scheduler
Schedule jobs with this framework-agnostic cron scheduler, which can be easily integrated into your existing project or run as a standalone command scheduler.

## License
Licensed under MIT. Totally free for private or commercial projects.

## Installation
```text
composer require andrewdyer/scheduler
```

## Usage

```php
// SendReminderJob.php
namespace App\Jobs;

use Anddye\Scheduler\AbstractJob;

class SendReminderJob extends AbstractJob
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

// At every 45th minute, run the send reminder job.
$scheduler->addJob(new App\Jobs\SendReminderJob())->setExpression('*/45 * * * *');

// add more jobs ...

$scheduler->run();
```

### Job Frequencies
| Helper Method | Runs... | Example |
| --- | --- | --- |
| daily()| At 00:00 | `$scheduler->addJob($job)->daily()` |
| dailyAt(int $hour, int $minute)| At a specific hour and minute | `$scheduler->addJob($job)->dailyAt(12, 30)` |
| dailyTwice(int $firstHour, int $lastHour) | At minute 0 past two specific hours | `$scheduler->addJob($job)->dailyTwice(11, 23)` |
| mondays() | At every minute on Monday | `$scheduler->addJob($job)->mondays()` |
| tuesdays() | At every minute on Tuesday | `$scheduler->addJob($job)->tuesdays()` |
| wednesdays() | At every minute on Wednesday | `$scheduler->addJob($job)->wednesdays()` |
| thursdays() | At every minute on Thursday | `$scheduler->addJob($job)->thursdays()` |
| fridays() | At every minute on Friday | `$scheduler->addJob($job)->fridays()` |
| saturdays() | At every minute on Saturday | `$scheduler->addJob($job)->saturdays()` |
| sundays() | At every minute on Sunday | `$scheduler->addJob($job)->sundays()` |
| weekdays() | At every minute on Monday, Tuesday, Wednesday, Thursday, and Friday | `$scheduler->addJob($job)->weekdays()` |
| weekends() | At every minute on Saturday and Sunday | `$scheduler->addJob($job)->weekends()` |
| days(int ...$days) | At every minute on specific days | `$scheduler->addJob($job)->days(2, 4, 6)` |
| everyMinute() | At every minute | `$scheduler->addJob($job)->everyMinute()` |
| everyFiveMinutes() | At every 5th minute | `$scheduler->addJob($job)->everyFiveMinutes()` |
| everyTenMinutes() | At every 10th minute| `$scheduler->addJob($job)->everyTenMinutes()` |
| everyFifteenMinutes() | At every 15th minute | `$scheduler->addJob($job)->everyFifteenMinutes()` |
| everyThirtyMinutes() | At every 30th minute | `$scheduler->addJob($job)->everyThirtyMinutes()` |
| hourly() | At minute 1 | `$scheduler->addJob($job)->hourly()` |
| hourlyAt(int $minute) | At a specific minute | `$scheduler->addJob($job)->hourlyAt(45)` |
| monthly() | At 00:00 on day-of-month 1 | `$scheduler->addJob($job)->monthly()` |
| monthlyOn(int $day) | At 00:00 on a specific day-of-month | `$scheduler->addJob($job)->monthlyOn(4)` |
| on(int $day) | At every minute on a specific day-of-month | `$scheduler->addJob($job)->on(1)` |

### Combining Job Frequencies
```php
// At minute 0 past hour 2 and 14 on Monday
$scheduler->addJob(new App\Jobs\SendReminderJob())->dailyTwice(2, 14)->mondays();
```

```php
// At every 15th minute on Friday
$scheduler->addJob(new App\Jobs\SendReminderJob())->everyFifteenMinutes()->fridays();
```

```php
// At every minute on Tuesday, Thursday, and Saturday
$scheduler->addJob(new App\Jobs\SendReminderJob())->everyMinute()->days(2, 4, 6);
```

```php
// At minute 45 on Monday, Tuesday, Wednesday, Thursday, and Friday
$scheduler->addJob(new App\Jobs\SendReminderJob())->hourlyAt(45)->weekdays();
```

```php
// At minute 1 on Monday, Wednesday, and Friday
$scheduler->addJob(new App\Jobs\SendReminderJob())->hourly()->days(1,3,5);
```
