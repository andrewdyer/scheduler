<?php

namespace Anddye\Scheduler\Tests\Unit;

use Anddye\Scheduler\Tests\Fixtures\Events\SendReminderEvent;
use PHPUnit\Framework\TestCase;

final class FrequenciesTest extends TestCase
{
    private $event;

    protected function setUp(): void
    {
        $this->event = new SendReminderEvent();
    }

    public function testCombiningDailyTwiceWithMondays(): void
    {
        $expression = '0 2,14 * * 1';

        $this->event->dailyTwice(2, 14)->mondays();

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testCombiningEveryFifteenMinutesWithFridays(): void
    {
        $expression = '*/15 * * * 5';

        $this->event->everyFifteenMinutes()->fridays();

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testCombiningEveryMinuteWithDays(): void
    {
        $expression = '* * * * 2,4,6';

        $this->event->everyMinute()->days(2, 4, 6);

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testCombiningHourlyAtWithWeekdays(): void
    {
        $expression = '45 * * * 1,2,3,4,5';

        $this->event->hourlyAt(45)->weekdays();

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testDaily(): void
    {
        $expression = '0 0 * * *';

        $this->event->daily();

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testDailyAt(): void
    {
        $expression = '30 1 * * *';

        $this->event->dailyAt(1, 30);

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testDailyTwice(): void
    {
        $expression = '0 8,17 * * *';

        $this->event->dailyTwice(8, 17);

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testMondays(): void
    {
        $expression = '* * * * 1';

        $this->event->mondays();

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testTuesdays(): void
    {
        $expression = '* * * * 2';

        $this->event->tuesdays();

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testWednesdays(): void
    {
        $expression = '* * * * 3';

        $this->event->wednesdays();

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testThursdays(): void
    {
        $expression = '* * * * 4';

        $this->event->thursdays();

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testFridays(): void
    {
        $expression = '* * * * 5';

        $this->event->fridays();

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testSaturdays(): void
    {
        $expression = '* * * * 6';

        $this->event->saturdays();

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testSundays(): void
    {
        $expression = '* * * * 7';

        $this->event->sundays();

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testWeekdays(): void
    {
        $expression = '* * * * 1,2,3,4,5';

        $this->event->weekdays();

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testWeekends(): void
    {
        $expression = '* * * * 6,7';

        $this->event->weekends();

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testDays(): void
    {
        $expression = '* * * * 1,3,5';

        $this->event->days(1, 3, 5);

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testEveryMinute(): void
    {
        $expression = '* * * * *';

        $this->event->everyMinute();

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testEveryFiveMinutes(): void
    {
        $expression = '*/5 * * * *';

        $this->event->everyFiveMinutes();

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testEveryTenMinutes(): void
    {
        $expression = '*/10 * * * *';

        $this->event->everyTenMinutes();

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testEveryFifteenMinutes(): void
    {
        $expression = '*/15 * * * *';

        $this->event->everyFifteenMinutes();

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testEveryThirtyMinutes(): void
    {
        $expression = '*/30 * * * *';

        $this->event->everyThirtyMinutes();

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testHourly(): void
    {
        $expression = '1 * * * *';

        $this->event->hourly();

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testHourlyAt(): void
    {
        $expression = '20 * * * *';

        $this->event->hourlyAt(20);

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testMonthly(): void
    {
        $expression = '0 0 1 * *';

        $this->event->monthly();

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testMonthlyOn(): void
    {
        $expression = '0 0 25 * *';

        $this->event->monthlyOn(25);

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testOn(): void
    {
        $expression = '* * 4 * *';

        $this->event->on(4);

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testReplaceIntoExpression(): void
    {
        $expression = '*/15 * * * *';

        $this->event->replaceIntoExpression(1, ['*/15']);

        $this->assertEquals($expression, $this->event->getExpression());
    }

    public function testSetExpression(): void
    {
        $expression = '*/15 * * * *';

        $this->event->setExpression($expression);

        $this->assertEquals($expression, $this->event->getExpression());
    }
}
