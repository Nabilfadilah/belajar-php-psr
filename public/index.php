<?php

require_once __DIR__ . '/../vendor/autoload.php';

// untuk mendapatkan HTTP request server
$factory = new \Nyholm\Psr7\Factory\Psr17Factory();
$creator = new \Nyholm\Psr7Server\ServerRequestCreator($factory, $factory, $factory, $factory);

$request = $creator->fromGlobals(); // tangkap request, simpan di object $request
$query = $request->getQueryParams(); // dapatkan query param

$name = $query['name'];

// bac response
$response = new \Nyholm\Psr7\Response(
    status: 200,
    headers: [
        'Content-Type' => 'application/json'
    ],
    body: $factory->createStream(json_encode([
        'data' => 'Hello ' . $name
    ]))
);

// untuk menulisakan http response nya
$emitter = new \Laminas\HttpHandlerRunner\Emitter\SapiEmitter();
$emitter->emit($response);
