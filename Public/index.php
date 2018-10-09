<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->get('/name/{names}', function (Request $request, Response $response, array $args) {
    $names = $args['names'];
    $response->getBody()->write("Hello, $names is your name right ?");

    return $response;
});


$app->post('/test/post', function (Request $Req , Response $Res) {

	$data=$Req->getParsedBody();
	$fiteredData=[];
	$fiteredData['name'] = filter_var($data['name'],FILTER_SANITIZE_STRING);
	$fiteredData['phone'] = filter_var($data['phone'],FILTER_SANITIZE_STRING);

	$Res->getBody()->write("Hello " . $fiteredData['name'] . " Your phone number is " .
	 $fiteredData['phone']);


});

$app->run();