<?php

namespace app\component;

/**
 * Расчет по формуле Бине
 * Class TribonachiFormula
 * @package app\component
 */
class TribonachiBine extends BaseTribonachi
{
    /**
     * Формула Бине
     * https://ru.wikipedia.org/wiki/%D0%A7%D0%B8%D1%81%D0%BB%D0%B0_%D1%82%D1%80%D0%B8%D0%B1%D0%BE%D0%BD%D0%B0%D1%87%D1%87%D0%B8
     * @return int
     */
    private function formulaBine()
    {
        $k = 1 / 3;
        $sqrt33 = sqrt(33);

        $aPlus = (19 + 3 * $sqrt33) ** $k;
        $aMinus = (19 - 3 * $sqrt33) ** $k;
        $b = (586 + 102 * $sqrt33) ** $k;

        $ches = (($aPlus + $aMinus + 1) * $k) ** ($this->num - 1); // Чеслитель
        $znam = $b ** 2 - 2 * $b + 4; // Знаменатель
        $mno = 3 * $b;

        return $mno * ($ches / $znam);
    }

    /** Расчет */
    protected function calc(): float
    {
        $value = $this->formulaBine();
        return (float)round($value);
    }
}