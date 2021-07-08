<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Src\Dollar;
use Src\Franc;
use Src\Money;

/**
 * TODO
 * - [ ] $5 + 10CHF = $10（レートが2:1の場合）
 * - [x] $5 * 2 = $10
 * - [x] 5 CHF * 2 = 10CHF
 * - [x] equals()
 * - [ ] Moneyの丸め処理どうする？
 * - [ ] hashCode()
 * - [ ] NULLとの等価性比較
 * - [ ] 他のオブジェクトとの等価性比較
 */
class MoneyTest extends TestCase
{
    /**
     * $5 * 2 = $10
     */
    public function testMultiplication()
    {
        $five = Money::dollar(5);
        $this->assertEquals(new Dollar(10), $five->times(2));
        $this->assertEquals(new Dollar(15), $five->times(3));
    }

    /**
     * Equals()
     *
     * 三角測量 = テストがたまたま通過したということが起こらないように、２つ以上の値を使用しテストを書く
     */
    public function testEquals()
    {
        $this->assertTrue(Money::dollar(5)->equals(Money::dollar(5)));
        $this->assertFalse(Money::dollar(5)->equals(Money::dollar(6)));
        $this->assertTrue(Money::franc(5)->equals(Money::franc(5)));
        $this->assertFalse(Money::franc(5)->equals(Money::franc(6)));
        $this->assertFalse(Money::dollar(5)->equals(Money::franc(5)));
    }

    /**
     * 5 CHF * 2 = 10CHF
     *
     * @return void
     */
    public function testFrancMultiplication()
    {
        $five = Money::franc(5);
        $this->assertEquals(Money::franc(10), $five->times(2));
        $this->assertEquals(Money::franc(15), $five->times(3));
    }
}
