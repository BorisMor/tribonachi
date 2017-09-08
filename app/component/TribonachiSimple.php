<?php
/**
 * Расчет через рескурсию
 */

namespace app\component;

class TribonachiSimple extends BaseTribonachi
{
    protected function calc(): float
    {
        $val = [0, 0, 1]; // храним 3-ри последних значения

        if ($this->num < 2) {
            return $val[$this->num];
        }

        for ($i = 2; $i < $this->num; $i++) {
            $curValue = $val[2] + $val[1] + $val[0];

            if ($curValue == INF) {
                return INF;
            }

            // Смещаем старые значения \ запоминаем последнее
            $val[0] = $val[1];
            $val[1] = $val[2];
            $val[2] = $curValue;
        }

        return (float)$val[2];
    }
}