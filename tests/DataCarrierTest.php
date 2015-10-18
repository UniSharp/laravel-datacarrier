<?php
include_once 'src/helpers.php';

use Unisharp\DataCarrier\DataCarrier;
//use Illuminate\Support\Facades\Facade;
//use Mockery as m;

class TestObj
{
    static $static_attr;
    public $public_attr;
}

class DataCarrierTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
    }

    public function tearDown()
    {
    }

    public function testScalarSetGet()
    {
        // scalar
        $vals = ['string', 1, -5, 3.14, 12312490124, true, false];
        foreach ($vals as $val) {
            $dc = new DataCarrier();
            $res = $dc->set('key', $val);
            $this->assertSame(['key' => $val], $res);
            $this->assertSame($val, $dc->get('key'));
        }
    }

    public function testObjectSetGet()
    {
        $obj = new TestObj();
        $obj->public_attr = 'a';
        $obj::$static_attr = 'a';

        $dc = new DataCarrier();
        $dc->set('obj', $obj);
        $outObj = $dc->get('obj');
        $this->assertSame($obj, $outObj);

        $obj->public_attr = 'b';
        $this->assertSame($obj->public_attr, $outObj->public_attr);
    }

    public function testDefault()
    {
        $dc = new DataCarrier();
        $val = $dc->get('not_exists', 1);
        $this->assertSame(1, $val);
    }

    public function testExtend()
    {
        // TBD
    }

    public function testHold()
    {
        // TBD
    }

    public function testHelpers()
    {
        // TBD
    }
}
