<?php

namespace app\component;

/**
 * Базовый класс
 * Class BaseTribonachi
 * @package app\component
 */
abstract class BaseTribonachi
{
    /** @var int Число */
    protected $num;

    /** Расчет */
    abstract protected function calc(): float;

    /**
     * Запуск процесса расчета
     * @param $num
     * @return mixed
     * @throws \Exception
     */
    public static function process($num)
    {
        if ($num < 0) {
            throw new \Exception('Число не может быть меньше 0');
        }

        $model = new static();
        $model->num = $num;
        $value = $model->calc();

        if ($value == INF) {
            throw new \Exception('Превышение максимального возможного результата');
        }

        return $value;
    }
}