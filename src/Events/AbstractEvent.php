<?php

namespace Anddye\Scheduler\Events;

use Anddye\Scheduler\Frequencies;
use Cron\CronExpression;
use DateTimeInterface;

abstract class AbstractEvent implements EventInterface
{
    use Frequencies;

    private $expression = '* * * * *';

    public function isDueToRun(DateTimeInterface $date): bool
    {
        return (new CronExpression($this->getExpression()))->isDue($date);
    }
}
