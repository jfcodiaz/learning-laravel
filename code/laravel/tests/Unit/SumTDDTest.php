<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\SumTDD;

class SumTDDTest extends TestCase
{
    /**
     * @dataProvider sumData
     */
    public function test_example($expectedResult, $num1, $num2)
    {
        $sum = new SumTDD();
        $sum->setNumber1($num1);
        $sum->setNum2($num2);
        $result = $sum->result();
        $this->assertSame($expectedResult, $result);
    }

    public function sumData()
    {
        return [
            [25, 10, 15],
            [35, 20, 15],
            [10, -20, 30],
            [-50, -20, -30],
            [60, 24, 36],
        ];
    }
}
