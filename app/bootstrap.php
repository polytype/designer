<?php

use Polytype\Designer\Application;

use Symfony\Component\HttpFoundation\Request;

$app = new Application();

$app->before(function (Request $request, Application $app) {
    if ($request->attributes->has('accountName')) {
        $accountName = $request->attributes->get('accountName');
        $app['twig']->addGlobal('accountName', $accountName);
        //$app['space.repository'] = new PdoSpaceRepository($app['pdo']);
    }
});

return $app;
