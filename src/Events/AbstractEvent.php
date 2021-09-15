<?php

namespace Anddye\Scheduler\Events;

use Anddye\Scheduler\Frequencies;
use Cron\CronExpression;
use DateTimeInterface;

abstract class AbstractEvent
{
    use Frequencies;

    private $expression = '* * * * *';

    abstract public function handle(): void;

    public function isDueToRun(DateTimeInterface $date): bool
    {
        return (new CronExpression($this->getExpression()))->isDue($date);
    }
}
