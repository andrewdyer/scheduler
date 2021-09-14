<?php

namespace Anddye\Scheduler\Tests;

use Anddye\Scheduler\Frequencies;
use PHPUnit\Framework\TestCase;

final class FrequenciesTest extends TestCase
{
    use Frequencies;

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
