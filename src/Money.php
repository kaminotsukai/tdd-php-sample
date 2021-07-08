<?php declare(strict_types = 1);

namespace Src;

abstract class Money
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

    public static function dollar(int $money): Dollar
    {
        return new Dollar($money);
    }

    public static function franc(int $money): Franc
    {
        return new Franc($money);
    }

    abstract public function times(int $multiplier): Money;

    public function equals(object $object): bool
    {
        return (get_class($object) === get_class($this)) && ($this->amount === $object->amount);
    }
}
