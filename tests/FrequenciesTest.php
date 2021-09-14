<?php

namespace Anddye\Scheduler\Tests;

use Anddye\Scheduler\Frequencies;
use PHPUnit\Framework\TestCase;

final class FrequenciesTest extends TestCase
{
    use Frequencies;

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
