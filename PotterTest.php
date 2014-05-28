<?php
require_once('Potter.php');
class PotterTest extends PHPUnit_Framework_TestCase
{
    public function testgetBookPrice_getPrice()
    {
        $potter = new Potter();
        $this->assertEquals('0', $potter->getPrice());
        $this->assertEquals('8', $potter->getPrice([0]));
        $this->assertEquals('8', $potter->getPrice([1]));
        $this->assertEquals('8', $potter->getPrice([2]));
        $this->assertEquals('8', $potter->getPrice([3]));
        $this->assertEquals('8', $potter->getPrice([4]));
    }

    public function testbuy2Item_ShouldReturn_multiply_price_getPrice()
    {
        $potter = new Potter();
        $this->assertEquals('8 * 2', $potter->getPrice(array(0, 0)));
        $this->assertEquals('8 * 3', $potter->getPrice(array(1, 1, 1)));
    }

    public function testBuyWithDiscount_getPrice()
    {
        $potter = new Potter();
        $this->assertEquals('8 * 2 * 0.95', $potter->getPrice([0, 1]));
        $this->assertEquals('8 * 3 * 0.9',  $potter->getPrice([0, 1, 2]));
        $this->assertEquals('8 * 4 * 0.8',  $potter->getPrice([0, 1, 2, 3]));
        $this->assertEquals('8 * 5 * 0.75', $potter->getPrice([0, 1, 2, 3, 4]));
    }
}