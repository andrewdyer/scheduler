<?php

namespace Anddye\Scheduler;

use DateTime;
use DateTimeInterface;

class Scheduler
{
    private $datetime;
    private $events = [];

    public function __construct(DateTimeInterface $datetime = null)
    {
        $this->datetime = $datetime;
    }

    public function addEvent(Event $event): Event
    {
        $this->events[] = $event;

        return $event;
    }

    public function getDatetime(): DateTimeInterface
    {
        if (!$this->datetime) {
            return new DateTime();
        }

        return $this->datetime;
    }

    public function getEvents(): array
    {
        return $this->events;
    }

    public function run(): void
    {
        foreach ($this->getEvents() as $event) {
            if (!$event->isDueToRun($this->getDatetime())) {
                continue;
            }

            $event->handle();
        }
    }
}
