<?php

spl_autoload('Router');


/**
 * @todo
 * Переделать верстку на главной странице
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

