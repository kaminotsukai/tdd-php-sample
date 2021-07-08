<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Src\Dollar;

/**
 * TODO
 * - [x] $5 + 10CHF = $10（レートが2:1の場合）
 * - [x] equals()
 * - [ ] Moneyの丸め処理どうする？
 * - [ ] hashCode()
 * - [ ] NULLとの等価性比較
 * - [ ] 他のオブジェクトとの等価性比較
 */
class MoneyTest extends TestCase
{
    /**
     * $5 + 10CHF = $10（レートが2:1の場合）
     */
    public function testMultiplication()
    {
        $five = new Dollar(5);
        $product = $five->times(2);
        $this->assertEquals(10, $product->ammount());
        $product = $five->times(3);
        $this->assertEquals(15, $product->ammount());
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
}
