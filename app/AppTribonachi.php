<?php
/**
 * Created by PhpStorm.
 * User: Boris
 * Date: 05.09.2017
 * Time: 15:48
 */

namespace app;

use Slim\Slim;

/**
 * Обертка на контроллере
 * Class AppTribonachi
 * @package app
 */
class AppTribonachi extends Slim
{
    public function __construct(array $userSettings = array())
    {
        parent::__construct($userSettings);
        $this->error([$this, 'answerError']); // обработчик ошибок
    }

    /**
     * json ответ
     * @param $data
     * @param int $code Код ответа
     */
    public function json($data, $code = 200)
    {
        $response = $this->response();
        $response['Content-Type'] = 'application/json';
        $response->status($code);
        $response->body(json_encode($data));
    }

    /**
     * Стандартнй формат ответа
     * @param $num
     * @param $value
     */
    public function answerStandart($num, $value)
    {
        $this->json([
            'num' => $num,
            'value' => number_format($value, 0, '.', '')
        ]);
    }

    /**
     * Вывод сообщени об ошибках
     * @param \Exception|string $error
     */
    public function answerError($error)
    {
        if ($error instanceof \Exception) {
            $message = $error->getMessage();
        } else {
            $message = $error;
        }

        $this->json([
            'message' => $message
        ], 500);
    }
}