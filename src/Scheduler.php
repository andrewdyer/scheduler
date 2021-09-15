<?php

namespace Anddye\Scheduler;

use DateTime;
use DateTimeInterface;

class Scheduler
{
    private $date;
    private $events = [];

    public function addEvent(Event $event): Event
    {
        $this->events[] = $event;

        return $event;
    }

    public function getDate(): DateTimeInterface
    {
        if (!$this->date) {
            return new DateTime();
        }

        return $this->date;
    }

    public function getEvents(): array
    {
        return $this->events;
    }

    public function run(): void
    {
        foreach ($this->getEvents() as $event) {
            if (!$event->isDueToRun(new DateTime())) {
                continue;
            }

            $event->handle();
        }
    }

    public function setDate(DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
