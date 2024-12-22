<?php

namespace Anddye\Scheduler\Tests\Unit;

use Anddye\Scheduler\Tests\Fixtures\Jobs\SendReminderJob;
use PHPUnit\Framework\TestCase;

final class FrequenciesTest extends TestCase
{
    private $job;

    protected function setUp(): void
    {
        $this->job = new SendReminderJob();
    }

    public function testCombiningDailyTwiceWithMondays(): void
    {
        $expression = '0 2,14 * * 1';

        $this->job->dailyTwice(2, 14)->mondays();

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testCombiningEveryFifteenMinutesWithFridays(): void
    {
        $expression = '*/15 * * * 5';

        $this->job->everyFifteenMinutes()->fridays();

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testCombiningEveryMinuteWithDays(): void
    {
        $expression = '* * * * 2,4,6';

        $this->job->everyMinute()->days(2, 4, 6);

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testCombiningHourlyAtWithWeekdays(): void
    {
        $expression = '45 * * * 1,2,3,4,5';

        $this->job->hourlyAt(45)->weekdays();

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testCombiningHourlyWithDays(): void
    {
        $expression = '1 * * * 1,3,5';

        $this->job->hourly()->days(1, 3, 5);

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testDaily(): void
    {
        $expression = '0 0 * * *';

        $this->job->daily();

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testDailyAt(): void
    {
        $expression = '30 1 * * *';

        $this->job->dailyAt(1, 30);

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testDailyTwice(): void
    {
        $expression = '0 8,17 * * *';

        $this->job->dailyTwice(8, 17);

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testMondays(): void
    {
        $expression = '* * * * 1';

        $this->job->mondays();

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testTuesdays(): void
    {
        $expression = '* * * * 2';

        $this->job->tuesdays();

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testWednesdays(): void
    {
        $expression = '* * * * 3';

        $this->job->wednesdays();

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testThursdays(): void
    {
        $expression = '* * * * 4';

        $this->job->thursdays();

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testFridays(): void
    {
        $expression = '* * * * 5';

        $this->job->fridays();

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testSaturdays(): void
    {
        $expression = '* * * * 6';

        $this->job->saturdays();

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testSundays(): void
    {
        $expression = '* * * * 7';

        $this->job->sundays();

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testWeekdays(): void
    {
        $expression = '* * * * 1,2,3,4,5';

        $this->job->weekdays();

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testWeekends(): void
    {
        $expression = '* * * * 6,7';

        $this->job->weekends();

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testDays(): void
    {
        $expression = '* * * * 1,3,5';

        $this->job->days(1, 3, 5);

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testEveryMinute(): void
    {
        $expression = '* * * * *';

        $this->job->everyMinute();

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testEveryFiveMinutes(): void
    {
        $expression = '*/5 * * * *';

        $this->job->everyFiveMinutes();

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testEveryTenMinutes(): void
    {
        $expression = '*/10 * * * *';

        $this->job->everyTenMinutes();

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testEveryFifteenMinutes(): void
    {
        $expression = '*/15 * * * *';

        $this->job->everyFifteenMinutes();

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testEveryThirtyMinutes(): void
    {
        $expression = '*/30 * * * *';

        $this->job->everyThirtyMinutes();

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testHourly(): void
    {
        $expression = '1 * * * *';

        $this->job->hourly();

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testHourlyAt(): void
    {
        $expression = '20 * * * *';

        $this->job->hourlyAt(20);

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testMonthly(): void
    {
        $expression = '0 0 1 * *';

        $this->job->monthly();

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testMonthlyOn(): void
    {
        $expression = '0 0 25 * *';

        $this->job->monthlyOn(25);

        $this->assertEquals($expression, $this->job->getExpression());
    }

    public function testOn(): void
    {
        $expression = '* * 4 * *';

        $this->job->on(4);

        $this->assertEquals($expression, $this->job->getExpression());
    }
}
