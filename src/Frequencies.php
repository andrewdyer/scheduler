<?php

namespace Anddye\Scheduler;

trait Frequencies
{
    public $expression = '* * * * *';

    public function daily(): self
    {
        return $this->dailyAt(0, 0);
    }

    public function dailyAt(int $hour, int $minute): self
    {
        return $this->replaceIntoExpression(1, [$minute, $hour]);
    }

    public function dailyTwice(int $firstHour, int $lastHour): self
    {
        return $this->replaceIntoExpression(1, [0, "{$firstHour},{$lastHour}"]);
    }

    public function mondays(): self
    {
        return $this->days(1);
    }

    public function tuesdays(): self
    {
        return $this->days(2);
    }

    public function wednesdays(): self
    {
        return $this->days(3);
    }

    public function thursdays(): self
    {
        return $this->days(4);
    }

    public function fridays(): self
    {
        return $this->days(5);
    }

    public function saturdays(): self
    {
        return $this->days(6);
    }

    public function sundays(): self
    {
        return $this->days(7);
    }

    public function days(int ...$days): self
    {
        return $this->replaceIntoExpression(5, [implode(',', $days)]);
    }

    public function everyMinute(): self
    {
        return $this->setExpression('* * * * *');
    }

    public function everyFiveMinutes(): self
    {
        return $this->replaceIntoExpression(1, ['*/5']);
    }

    public function everyTenMinutes(): self
    {
        return $this->replaceIntoExpression(1, ['*/10']);
    }

    public function everyFifteenMinutes(): self
    {
        return $this->replaceIntoExpression(1, ['*/15']);
    }

    public function everyThirtyMinutes(): self
    {
        return $this->replaceIntoExpression(1, ['*/30']);
    }

    public function getExpression(): string
    {
        return $this->expression;
    }

    public function hourly(): self
    {
        return $this->hourlyAt(1);
    }

    public function hourlyAt(int $minute): self
    {
        return $this->replaceIntoExpression(1, [$minute]);
    }

    public function monthly(): self
    {
        return $this->monthlyOn(1);
    }

    public function monthlyOn(int $day): self
    {
        return $this->replaceIntoExpression(1, [0, 0, $day]);
    }

    public function replaceIntoExpression(int $position, array $value): self
    {
        $expression = explode(' ', $this->getExpression());

        array_splice($expression, $position - 1, count($value), $value);

        $expression = array_slice($expression, 0, 5);

        return $this->setExpression(implode(' ', $expression));
    }

    public function setExpression(string $expression): self
    {
        $this->expression = $expression;

        return $this;
    }
}
