<?php

namespace Anddye\Scheduler\Tests\Integration;

use Anddye\Scheduler\Event;
use Anddye\Scheduler\Scheduler;
use DateTime;
use PHPUnit\Framework\TestCase;

final class SchedulerTest extends TestCase
{
    public function testCanAddEvents(): void
    {
        $event = $this->getMockForAbstractClass(Event::class);

        $scheduler = new Scheduler();
        $scheduler->addEvent($event);
        $scheduler->run();

        $this->assertCount(1, $scheduler->getEvents());
    }

    public function testCanGetEvents(): void
    {
        $scheduler = new Scheduler();

        $this->assertEquals([], $scheduler->getEvents());
    }

    public function testCanSetDateTime()
    {
        $datetime = new DateTime('2021-09-15');

        $scheduler = new Scheduler($datetime);

        $this->assertEquals($datetime, $scheduler->getDatetime());
    }

    public function testDoesNotRunUnexpectedEvent(): void
    {
        $event = $this->getMockForAbstractClass(Event::class);
        $event->expects($this->never())->method('handle');

        $datetime = new DateTime('2021-09-15');

        $scheduler = new Scheduler($datetime);
        $scheduler->addEvent($event)->weekends();
        $scheduler->run();

        $this->assertEquals($datetime, $scheduler->getDatetime());
    }

    public function testRunsExpectedEvent(): void
    {
        $event = $this->getMockForAbstractClass(Event::class);
        $event->expects($this->once())->method('handle');

        $datetime = new DateTime('2021-09-15');

        $scheduler = new Scheduler($datetime);
        $scheduler->addEvent($event)->weekdays();
        $scheduler->run();

        $this->assertEquals($datetime, $scheduler->getDatetime());
    }
}
