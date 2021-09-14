# Scheduler

## Frequency Helpers
| Helper | Description |
| --- | --- |
| daily()| At 00:00 |
| dailyAt(int $hour, int $minute)| At a specific hour and minute |
| dailyTwice(int $firstHour, int $lastHour) | At minute 0 past two specific hours |
| monday() | At every minute on Monday |
| tuesdays() | At every minute on Tuesday |
| wednesdays() | At every minute on Wednesday |
| thursdays() | At every minute on Thursday |
| fridays() | At every minute on Friday |
| saturdays() | At every minute on Saturday |
| sundays() | At every minute on Sunday |
| weekdays() | At every minute on Monday, Tuesday, Wednesday, Thursday, and Friday |
| weekends() | At every minute on Saturday and Sunday |
| days(int ...$days) | At every minute on specific days |
| everyMinute() | At every minute |
| everyFiveMinutes() | At every 5th minute |
| everyTenMinutes() | At every 10th minute|
| everyFifteenMinutes() | At every 15th minute |
| everyThirtyMinutes() | At every 30th minute |
| hourly() | At minute 1 |
| hourlyAt(int $minute) | At a specific minute |
| monthly() | At 00:00 on day-of-month 1 |
| monthlyOn(int $day) | At 00:00 on a specific day-of-month |
| on(int $day) | At every minute on a specific day-of-month |
