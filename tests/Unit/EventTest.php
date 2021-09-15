<?php

namespace Anddye\Scheduler\Tests\Unit;

use Anddye\Scheduler\Tests\Fixtures\Events\SendReminderEvent;
use DateTime;
use PHPUnit\Framework\TestCase;

final class EventTest extends TestCase
{
    public function testIsDueToRun(): void
    {
        $date = new DateTime('2021-09-13');

        $event = new SendReminderEvent();
        $event->mondays();

        $this->assertTrue($event->isDueToRun($date));
    }

    public function testIsNotDueToRun(): void
    {
        $date = new DateTime('2021-09-13');

        $event = new SendReminderEvent();
        $event->mondays();

        $this->assertTrue($event->isDueToRun($date));
    }
}
