<?php

namespace Anddye\Scheduler;

trait Frequencies
{
    public $expression = '* * * * *';

    public function everyMinute()
    {
        return $this->setExpression($this->getExpression());
    }

    public function everyFiveMinutes()
    {
        return $this->replaceIntoExpression(1, ['*/5']);
    }

    public function everyTenMinutes()
    {
        return $this->replaceIntoExpression(1, ['*/10']);
    }

    public function everyFifteenMinutes()
    {
        return $this->replaceIntoExpression(1, ['*/15']);
    }

    public function everyThirtyMinutes()
    {
        return $this->replaceIntoExpression(1, ['*/30']);
    }

    public function getExpression(): string
    {
        return $this->expression;
    }

    public function replaceIntoExpression(int $position, array $value)
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
