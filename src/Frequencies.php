<?php

namespace Anddye\Scheduler;

/**
 * Trait Frequencies
 *
 * @package Anddye\Scheduler
 */
trait Frequencies
{
    /**
     * Schedule the job to run daily.
     *
     * @return self
     */
    public function daily(): self
    {
        return $this->dailyAt(0, 0);
    }

    /**
     * Schedule the job to run daily at a specific time.
     *
     * @param int $hour
     * @param int $minute
     * @return self
     */
    public function dailyAt(int $hour, int $minute): self
    {
        return $this->replaceIntoExpression(1, [$minute, $hour]);
    }

    /**
     * Schedule the job to run twice daily.
     *
     * @param int $firstHour
     * @param int $lastHour
     * @return self
     */
    public function dailyTwice(int $firstHour, int $lastHour): self
    {
        return $this->replaceIntoExpression(1, [0, "{$firstHour},{$lastHour}"]);
    }

    /**
     * Schedule the job to run on Mondays.
     *
     * @return self
     */
    public function mondays(): self
    {
        return $this->days(1);
    }

    /**
     * Schedule the job to run on Tuesdays.
     *
     * @return self
     */
    public function tuesdays(): self
    {
        return $this->days(2);
    }

    /**
     * Schedule the job to run on Wednesdays.
     *
     * @return self
     */
    public function wednesdays(): self
    {
        return $this->days(3);
    }

    /**
     * Schedule the job to run on Thursdays.
     *
     * @return self
     */
    public function thursdays(): self
    {
        return $this->days(4);
    }

    /**
     * Schedule the job to run on Fridays.
     *
     * @return self
     */
    public function fridays(): self
    {
        return $this->days(5);
    }

    /**
     * Schedule the job to run on Saturdays.
     *
     * @return self
     */
    public function saturdays(): self
    {
        return $this->days(6);
    }

    /**
     * Schedule the job to run on Sundays.
     *
     * @return self
     */
    public function sundays(): self
    {
        return $this->days(7);
    }

    /**
     * Schedule the job to run on weekdays.
     *
     * @return self
     */
    public function weekdays(): self
    {
        return $this->days(1, 2, 3, 4, 5);
    }

    /**
     * Schedule the job to run on weekends.
     *
     * @return self
     */
    public function weekends(): self
    {
        return $this->days(6, 7);
    }

    /**
     * Schedule the job to run on specific days.
     *
     * @param int ...$days
     * @return self
     */
    public function days(int ...$days): self
    {
        return $this->replaceIntoExpression(5, [implode(',', $days)]);
    }

    /**
     * Schedule the job to run every minute.
     *
     * @return self
     */
    public function everyMinute(): self
    {
        return $this->setExpression('* * * * *');
    }

    /**
     * Schedule the job to run every five minutes.
     *
     * @return self
     */
    public function everyFiveMinutes(): self
    {
        return $this->replaceIntoExpression(1, ['*/5']);
    }

    /**
     * Schedule the job to run every ten minutes.
     *
     * @return self
     */
    public function everyTenMinutes(): self
    {
        return $this->replaceIntoExpression(1, ['*/10']);
    }

    /**
     * Schedule the job to run every fifteen minutes.
     *
     * @return self
     */
    public function everyFifteenMinutes(): self
    {
        return $this->replaceIntoExpression(1, ['*/15']);
    }

    /**
     * Schedule the job to run every thirty minutes.
     *
     * @return self
     */
    public function everyThirtyMinutes(): self
    {
        return $this->replaceIntoExpression(1, ['*/30']);
    }

    /**
     * Get the cron expression.
     *
     * @return string
     */
    public function getExpression(): string
    {
        return $this->expression;
    }

    /**
     * Schedule the job to run hourly.
     *
     * @return self
     */
    public function hourly(): self
    {
        return $this->hourlyAt(1);
    }

    /**
     * Schedule the job to run hourly at a specific minute.
     *
     * @param int $minute
     * @return self
     */
    public function hourlyAt(int $minute): self
    {
        return $this->replaceIntoExpression(1, [$minute]);
    }

    /**
     * Schedule the job to run monthly.
     *
     * @return self
     */
    public function monthly(): self
    {
        return $this->monthlyOn(1);
    }

    /**
     * Schedule the job to run monthly on a specific day.
     *
     * @param int $day
     * @return self
     */
    public function monthlyOn(int $day): self
    {
        return $this->replaceIntoExpression(1, [0, 0, $day]);
    }

    /**
     * Schedule the job to run on a specific day.
     *
     * @param int $day
     * @return self
     */
    public function on(int $day): self
    {
        return $this->replaceIntoExpression(3, [$day]);
    }

    /**
     * Replace a part of the cron expression.
     *
     * @param int $position
     * @param array $value
     * @return self
     */
    public function replaceIntoExpression(int $position, array $value): self
    {
        $expression = explode(' ', $this->getExpression());

        array_splice($expression, $position - 1, count($value), $value);

        $expression = array_slice($expression, 0, 5);

        return $this->setExpression(implode(' ', $expression));
    }

    /**
     * Set the cron expression.
     *
     * @param string $expression
     * @return self
     */
    public function setExpression(string $expression): self
    {
        $this->expression = $expression;

        return $this;
    }
}
