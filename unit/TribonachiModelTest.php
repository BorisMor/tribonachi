<?php
// require_once 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;

/**
 * Тестирование трибоначи
 * Class TribonachiModelTest
 */
class TribonachiModelTest extends TestCase
{
    /**
     * Проверка тестовых значений для класса TribonachiSimple
     * @dataProvider valueProvider
     */
    function testValueSimle($num, $value)
    {
        $checkValue = \app\component\TribonachiSimple::process($num);
        $this->assertTrue($checkValue == $value, 'check value TribonachiSimple');
    }

    /**
     * Проверка тестовых значений для класса TribonachiBine
     * @dataProvider valueProvider
     */
    function testValueBine($num, $value)
    {
        $checkValue = \app\component\TribonachiBine::process($num);
        $this->assertTrue($checkValue == $value, 'check value TribonachiBine');
    }


    /**
     * Ожижаем исключение при превышение float
     * @dataProvider classProvider
     * @expectedException Exception
     */
    function testMaxValueForSimple($class)
    {
        $class::process(1168);
    }

    /**
     * Ожидаем проверку числа меньше 1
     * @dataProvider classProvider
     * @expectedException Exception
     */
    function testMinNumber($class)
    {
        $class::process(-1);
    }

    /**
     * Список результатов [число, значениеъ]
     * @return array
     */
    public function valueProvider()
    {
        return [
            [0, 0],
            [1, 0],
            [2, 1],
            [3, 1],
            [4, 2],
            [5, 4],
            [6, 7],
            [7, 13],
            [8, 24],
            [9, 44],
            [10, 81],
            [11, 149],
            [12, 274],
            [13, 504],
            [14, 927],
            [15, 1705],
            [16, 3136],
            [17, 5768],
            [18, 10609],
            [19, 19513],
            [20, 35890],
            [21, 66012],
            [22, 121415],
            [23, 223317],
            [24, 410744],
            [25, 755476],
            [26, 1389537],
            [27, 2555757],
            [28, 4700770],
            [29, 8646064],
            [30, 15902591],
            [31, 29249425],
            [32, 53798080],
            [33, 98950096],
            [34, 181997601],
            [35, 334745777],
            [36, 615693474],
            [37, 1132436852],
        ];
    }

    public function classProvider()
    {
        return [
            ['\app\component\TribonachiSimple'],
            ['\app\component\TribonachiBine']
        ];
    }
}