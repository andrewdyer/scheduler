<?php

namespace Anddye\Scheduler\Tests\Integration;

use Anddye\Scheduler\AbstractJob;
use Anddye\Scheduler\Scheduler;
use DateTime;
use PHPUnit\Framework\TestCase;

final class SchedulerTest extends TestCase
{
    public function testCanAddJobs(): void
    {
        $job = $this->getMockForAbstractClass(AbstractJob::class);

        $scheduler = new Scheduler();
        $scheduler->addJob($job);
        $scheduler->run();

        $this->assertCount(1, $scheduler->getJobs());
    }

    public function testCanGetJobs(): void
    {
        $scheduler = new Scheduler();

        $this->assertEquals([], $scheduler->getJobs());
    }

    public function testCanSetDateTime()
    {
        $datetime = new DateTime('2021-09-15');

        $scheduler = new Scheduler($datetime);

        $this->assertEquals($datetime, $scheduler->getDatetime());
    }

    public function testDoesNotRunUnexpectedJob(): void
    {
        $job = $this->getMockForAbstractClass(AbstractJob::class);
        $job->expects($this->never())->method('handle');

        $datetime = new DateTime('2021-09-15');

        $scheduler = new Scheduler($datetime);
        $scheduler->addJob($job)->weekends();
        $scheduler->run();

        $this->assertEquals($datetime, $scheduler->getDatetime());
    }

    public function testRunsExpectedJob(): void
    {
        $job = $this->getMockForAbstractClass(AbstractJob::class);
        $job->expects($this->once())->method('handle');

        $datetime = new DateTime('2021-09-15');

        $scheduler = new Scheduler($datetime);
//        $scheduler->addJob($job)->daily();
//        $scheduler->addJob($job)->dailyAt(12, 30);
//        $scheduler->addJob($job)->dailyTwice(11, 23);
//        $scheduler->addJob($job)->mondays();
//        $scheduler->addJob($job)->tuesdays();
//        $scheduler->addJob($job)->wednesdays();
//        $scheduler->addJob($job)->thursdays();
//        $scheduler->addJob($job)->fridays();
//        $scheduler->addJob($job)->saturdays();
//        $scheduler->addJob($job)->sundays();
        $scheduler->addJob($job)->weekdays();
//        $scheduler->addJob($job)->weekends();
//        $scheduler->addJob($job)->days(2, 4, 6);
//        $scheduler->addJob($job)->everyMinute();
//        $scheduler->addJob($job)->everyFiveMinutes();
//        $scheduler->addJob($job)->everyTenMinutes();
//        $scheduler->addJob($job)->everyFifteenMinutes();
//        $scheduler->addJob($job)->everyThirtyMinutes();
//        $scheduler->addJob($job)->hourly();
//        $scheduler->addJob($job)->hourlyAt(45);
//        $scheduler->addJob($job)->monthly();
//        $scheduler->addJob($job)->monthlyOn(4);
//        $scheduler->addJob($job)->on(1);
        $scheduler->run();

        $this->assertEquals($datetime, $scheduler->getDatetime());
    }
}
