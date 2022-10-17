<?php

spl_autoload('Router');

/**
 * @todo
 * Для объектов базы надо сделать синглтон
 * переделать верстку на главной странице
 */
try {
    $router = new Router($_SERVER);
    $ctr = $router->getController();
    $action = $router->getAction();
    $params = $router->getParams();
    $postParams = $router->getPostParams();
    $ctr->$action($params, $postParams);
} catch (Throwable $exception) {
    echo $exception->getMessage();
    die();
}

