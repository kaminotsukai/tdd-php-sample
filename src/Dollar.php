<?php declare(strict_types = 1);

namespace Src;

class Dollar extends Money
{
    public function times(int $multiplier): self
    {
        return new self($this->amount * $multiplier);
    }
}
