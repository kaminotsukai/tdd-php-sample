<?php declare(strict_types = 1);

class Money
{
    private int $money;

    public function __construct(int $money)
    {
        $this->money = $money;
    }

    public function value(): int
    {
        return $this->money;
    }
}

class Stamp
{
    private Money $money;

    public function __construct(Money $money)
    {
        $this->money = $money;
    }

    public function setMoney(int $money)
    {
        $this->money = new Money($money);
    }

    public function money(): Money
    {
        return $this->money;
    }
}


$money = new Money(100);
$stam1 = new Stamp($money);
$stam2 = new Stamp($money);
$stam1->setMoney(200);

// Money
echo $stam1->money()->value(); // 200
echo PHP_EOL;
echo $stam2->money()->value(); // 100

