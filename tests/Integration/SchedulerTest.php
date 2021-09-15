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

    public function testCanSetDate()
    {
        $date = new DateTime('2021-09-15');

        $scheduler = new Scheduler();
        $scheduler->setDate($date);

        $this->assertEquals($date, $scheduler->getDate());
    }

    public function testDoesNotRunUnexpectedEvent(): void
    {
        $event = $this->getMockForAbstractClass(Event::class);
        $event->expects($this->never())->method('handle');

        $scheduler = new Scheduler();
        $scheduler->setDate(new DateTime('2021-09-15'));
        $scheduler->addEvent($event)->weekends();
        $scheduler->run();
    }

    public function testRunsExpectedEvent(): void
    {
        $event = $this->getMockForAbstractClass(Event::class);
        $event->expects($this->once())->method('handle');

        $scheduler = new Scheduler();
        $scheduler->setDate(new DateTime('2021-09-15'));
        $scheduler->addEvent($event)->weekdays();
        $scheduler->run();
    }
}