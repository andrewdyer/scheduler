<?php

namespace Anddye\Scheduler;

use Cron\CronExpression;
use DateTimeInterface;

abstract class Event
{
    use Frequencies;

    private $expression = '* * * * *';

    abstract public function handle(): void;

    public function isDueToRun(DateTimeInterface $date): bool
    {
        return (new CronExpression($this->getExpression()))->isDue($date);
    }
}
