<?php

namespace Anddye\Scheduler\Tests\Unit;

use Anddye\Scheduler\Frequencies;
use PHPUnit\Framework\TestCase;

final class FrequenciesTest extends TestCase
{
    use Frequencies;

    public function testCombiningDailyTwiceWithMondays(): void
    {
        $expression = '0 2,14 * * 1';

        $this->dailyTwice(2, 14)->mondays();

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testCombiningEveryFifteenMinutesWithFridays(): void
    {
        $expression = '*/15 * * * 5';

        $this->everyFifteenMinutes()->fridays();

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testCombiningEveryMinuteWithDays(): void
    {
        $expression = '* * * * 2,4,6';

        $this->everyMinute()->days(2, 4, 6);

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testCombiningHourlyAtWithWeekdays(): void
    {
        $expression = '45 * * * 1,2,3,4,5';

        $this->hourlyAt(45)->weekdays();

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testDaily(): void
    {
        $expression = '0 0 * * *';

        $this->daily();

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testDailyAt(): void
    {
        $expression = '30 1 * * *';

        $this->dailyAt(1, 30);

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testDailyTwice(): void
    {
        $expression = '0 8,17 * * *';

        $this->dailyTwice(8, 17);

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testMondays(): void
    {
        $expression = '* * * * 1';

        $this->mondays();

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testTuesdays(): void
    {
        $expression = '* * * * 2';

        $this->tuesdays();

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testWednesdays(): void
    {
        $expression = '* * * * 3';

        $this->wednesdays();

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testThursdays(): void
    {
        $expression = '* * * * 4';

        $this->thursdays();

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testFridays(): void
    {
        $expression = '* * * * 5';

        $this->fridays();

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testSaturdays(): void
    {
        $expression = '* * * * 6';

        $this->saturdays();

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testSundays(): void
    {
        $expression = '* * * * 7';

        $this->sundays();

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testWeekdays(): void
    {
        $expression = '* * * * 1,2,3,4,5';

        $this->weekdays();

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testWeekends(): void
    {
        $expression = '* * * * 6,7';

        $this->weekends();

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testDays(): void
    {
        $expression = '* * * * 1,3,5';

        $this->days(1, 3, 5);

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testEveryMinute(): void
    {
        $expression = '* * * * *';

        $this->everyMinute();

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testEveryFiveMinutes(): void
    {
        $expression = '*/5 * * * *';

        $this->everyFiveMinutes();

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testEveryTenMinutes(): void
    {
        $expression = '*/10 * * * *';

        $this->everyTenMinutes();

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testEveryFifteenMinutes(): void
    {
        $expression = '*/15 * * * *';

        $this->everyFifteenMinutes();

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testEveryThirtyMinutes(): void
    {
        $expression = '*/30 * * * *';

        $this->everyThirtyMinutes();

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testHourly(): void
    {
        $expression = '1 * * * *';

        $this->hourly();

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testHourlyAt(): void
    {
        $expression = '20 * * * *';

        $this->hourlyAt(20);

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testMonthly(): void
    {
        $expression = '0 0 1 * *';

        $this->monthly();

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testMonthlyOn(): void
    {
        $expression = '0 0 25 * *';

        $this->monthlyOn(25);

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testOn(): void
    {
        $expression = '* * 4 * *';

        $this->on(4);

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testReplaceIntoExpression(): void
    {
        $expression = '*/15 * * * *';

        $this->replaceIntoExpression(1, ['*/15']);

        $this->assertEquals($expression, $this->getExpression());
    }

    public function testSetExpression(): void
    {
        $expression = '*/15 * * * *';

        $this->setExpression($expression);

        $this->assertEquals($expression, $this->getExpression());
    }
}
