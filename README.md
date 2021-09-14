# Scheduler

## Frequencies
| Method | Description |
| --- | --- |
| daily()| Every day at midnight |
| dailyAt(int $hour, int $minute)| Every day at a specific hour and minute |
| dailyTwice(int $firstHour, int $lastHour) | At minute 0 past two specific hours |
| everyMinute() | At every minute |
| everyFiveMinutes() | At every 5th minute |
| everyTenMinutes() | At every 10th minute|
| everyFifteenMinutes() | At every 15th minute |
| everyThirtyMinutes() | At every 30th minute |
| hourly() | Every hour at minute 1 |
| hourlyAt(int $minute) | Every hour at a specific minute |
| monthly() | At 00:00 on day-of-month 1 |
| monthlyOn(int $day) | At 00:00 on a specific day-of-month |
