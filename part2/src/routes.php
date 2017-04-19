<?php
// Routes
$app->get('/', function ($request, $response, $args) {    //
    return $response->withStatus(301)->withHeader('Location', 'employees');
});

