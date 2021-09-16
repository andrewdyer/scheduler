<?php

namespace Anddye\Scheduler\Tests\Unit;

use Anddye\Scheduler\Tests\Fixtures\Jobs\SendReminderJob;
use DateTime;
use PHPUnit\Framework\TestCase;

final class JobTest extends TestCase
{
    public function testIsDueToRun(): void
    {
        $currentTime = new DateTime('2021-09-13');

        $job = new SendReminderJob();
        $job->mondays();

        $this->assertTrue($job->isDueToRun($currentTime));
    }

    public function testIsNotDueToRun(): void
    {
        $currentTime = new DateTime('2021-09-13');

        $job = new SendReminderJob();
        $job->mondays();

        $this->assertTrue($job->isDueToRun($currentTime));
    }
}
