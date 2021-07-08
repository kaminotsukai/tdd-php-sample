<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Src\Dollar;
use Src\Franc;

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
        $five = new Dollar(5);
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
        $dollar = new Dollar(5);
        $this->assertTrue($dollar->equals(new Dollar(5)));
        $this->assertFalse($dollar->equals(new Dollar(6)));
    }

    /**
     * 5 CHF * 2 = 10CHF
     *
     * @return void
     */
    public function testFrancMultiplication()
    {
        $five = new Franc(5);
        $this->assertEquals(new Franc(10), $five->times(2));
        $this->assertEquals(new Franc(15), $five->times(3));
    }
}
