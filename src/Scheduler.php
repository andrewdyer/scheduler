<?php

namespace Anddye\Scheduler;

use DateTime;
use DateTimeInterface;

/**
 * Class Scheduler
 *
 * @package Anddye\Scheduler
 */
class Scheduler
{
    private $datetime;
    private $jobs = [];

    /**
     * Scheduler constructor.
     *
     * @param DateTimeInterface|null $datetime
     */
    public function __construct(DateTimeInterface $datetime = null)
    {
        $this->datetime = $datetime;
    }

    /**
     * Add a job to the scheduler.
     *
     * @param AbstractJob $job
     * @return AbstractJob
     */
    public function addJob(AbstractJob $job): AbstractJob
    {
        $this->jobs[] = $job;

        return $job;
    }

    /**
     * Get the current datetime.
     *
     * @return DateTimeInterface
     */
    public function getDatetime(): DateTimeInterface
    {
        if (!$this->datetime) {
            return new DateTime();
        }

        return $this->datetime;
    }

    /**
     * Get the list of jobs.
     *
     * @return array
     */
    public function getJobs(): array
    {
        return $this->jobs;
    }

    /**
     * Run the scheduler.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->getJobs() as $job) {
            if (!$job->isDueToRun($this->getDatetime())) {
                continue;
            }

            $job->handle();
        }
    }
}
