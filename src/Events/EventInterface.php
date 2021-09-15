<?php

namespace Anddye\Scheduler\Events;

use DateTimeInterface;

interface EventInterface
{
    /**
     * Handle the event.
     */
    public function handle(): void;

    /**
     * Check if the event is due to run.
     */
    public function isDueToRun(DateTimeInterface $date): bool;
}
