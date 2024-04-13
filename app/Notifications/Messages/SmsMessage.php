<?php

namespace App\Notifications\Messages;

class SmsMessage
{
    protected array $lines;

    public function __construct($lines = [])
    {
        $this->lines = $lines;
    }

    public function line($line = ''): self
    {
        $this->lines[] = $line;

        return $this;
    }

    public function __toString(): string
    {
        return implode(PHP_EOL, $this->lines);
    }
}
