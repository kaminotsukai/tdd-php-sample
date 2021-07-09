<?php declare(strict_types = 1);

namespace Src;

class Money
{
    protected int $amount;
    protected string $currency;

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function ammount(): int
    {
        return $this->amount;
    }

    public function currency(): string
    {
        return $this->currency;
    }

    public static function dollar(int $money): Money
    {
        return new Money($money, 'USD');
    }

    public static function franc(int $money): Money
    {
        return new Money($money, 'CHF');
    }

    public function times(int $multiplier): Money
    {
        return new Money($this->amount * $multiplier, $this->currency);
    }

    public function equals(object $object): bool
    {
        return ($this->currency === $object->currency) && ($this->amount === $object->amount);
    }
}
