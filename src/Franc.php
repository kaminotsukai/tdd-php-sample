<?php declare(strict_types = 1);

namespace Src;

class Franc
{
    private int $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function times(int $multiplier): self
    {
        return new self($this->amount * $multiplier);
    }

    public function ammount(): int
    {
        return $this->amount;
    }

    public function equals(object $object): bool
    {
        return $object instanceof self
            ? $this->amount === $object->amount
            : false;
    }
}
