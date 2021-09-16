<?php

namespace Anddye\Scheduler;

use DateTime;
use DateTimeInterface;

class Scheduler
{
    private $datetime;
    private $jobs = [];

    public function __construct(DateTimeInterface $datetime = null)
    {
        $this->datetime = $datetime;
    }

    public function addJob(AbstractJob $job): AbstractJob
    {
        $this->jobs[] = $job;

        return $job;
    }

    public function getDatetime(): DateTimeInterface
    {
        if (!$this->datetime) {
            return new DateTime();
        }

        return $this->datetime;
    }

    public function getJobs(): array
    {
        return $this->jobs;
    }

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
