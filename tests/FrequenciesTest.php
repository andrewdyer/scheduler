<?php

namespace Anddye\Scheduler\Tests;

use Anddye\Scheduler\Frequencies;
use PHPUnit\Framework\TestCase;

final class FrequenciesTest extends TestCase
{
    use Frequencies;

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
        $expression = '0 0 1 * *';

        $this->monthlyOn(1);

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
