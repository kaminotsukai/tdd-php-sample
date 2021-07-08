<?php declare(strict_types = 1);

namespace Src;

class Money
{
    protected int $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
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
