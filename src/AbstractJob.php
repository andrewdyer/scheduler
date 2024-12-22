<?php

namespace Anddye\Scheduler;

use Cron\CronExpression;
use DateTimeInterface;

/**
 * Class AbstractJob
 *
 * @package Anddye\Scheduler
 */
abstract class AbstractJob
{
    use Frequencies;

    private $expression = '* * * * *';

    /**
     * Handle the job.
     *
     * @return void
     */
    abstract public function handle(): void;

    /**
     * Check if the job is due to run.
     *
     * @param DateTimeInterface $currentTime
     * @return bool
     */
    public function isDueToRun(DateTimeInterface $currentTime): bool
    {
        return (new CronExpression($this->getExpression()))->isDue($currentTime);
    }
}
