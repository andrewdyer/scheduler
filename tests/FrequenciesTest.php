<?php

namespace Anddye\Scheduler\Tests;

use Anddye\Scheduler\Frequencies;
use PHPUnit\Framework\TestCase;

final class FrequenciesTest extends TestCase
{
    use Frequencies;

    public function testSetExpression(): void
    {
        $expression = '*/15 * * * *';

        $this->setExpression($expression);

        $this->assertEquals($expression, $this->getExpression());
    }
}
