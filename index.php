<?php
$loader = require_once('vendor/autoload.php');

use app\component\TribonachiSimple;

$app = new \app\AppTribonachi(['debug' => false]);

/** Подсказка */
$app->get('/', function () use ($app) {
    $app->render('help.php');
});

/** Расчет перебором */
$app->get('/simple/:num', function ($num) use ($app) {
    $value = TribonachiSimple::process($num);
    $app->answerStandart($num, $value);
});

$app->get('/bine/:num', function ($num) use ($app) {
    $value = \app\component\TribonachiBine::process($num);
    $app->answerStandart($num, $value);
});

$app->run();