<?php
require 'Slim/Slim.php';
require_once 'idiorm.php';
require_once 'paris.php';
ORM::configure('mysql:host=localhost;dbname=mapDB');
ORM::configure('username', 'root');
ORM::configure('password', 'novel');
\Slim\Slim::registerAutoloader();


$app = new \Slim\Slim();
class dot extends Model{}
class ljp4 extends Model{}
class kegg extends Model{}
class kegg_rot extends Model{}
class pathway extends Model{}
class pathway_squeezed extends Model{}
class pathway_final extends Model{}

$app->get('/pathway_final', function() use ($app){

    $dotx = Model::factory('pathway_final')->find_many();
    // $x = $dotx -> as_array();
    $response = array();
    foreach ($dotx as $value){
        array_push($response, $value->as_array());
    }
    echo json_encode($response);
});


$app->get('/kegg', function() use ($app){

    $dotx = Model::factory('kegg')->find_many();
    // $x = $dotx -> as_array();
    $response = array();
    foreach ($dotx as $value){
        array_push($response, $value->as_array());
    }
    echo json_encode($response);
});

$app->get('/pathway_squeezed', function() use ($app){

    $dotx = Model::factory('pathway_squeezed')->find_many();
    // $x = $dotx -> as_array();
    $response = array();
    foreach ($dotx as $value){
        array_push($response, $value->as_array());
    }
    echo json_encode($response);
});

$app->get('/pathway', function() use ($app){

    $dotx = Model::factory('pathway')->find_many();
    // $x = $dotx -> as_array();
    $response = array();
    foreach ($dotx as $value){
        array_push($response, $value->as_array());
    }
    echo json_encode($response);
});

$app->get('/kegg_rot', function() use ($app){

    $dotx = Model::factory('kegg_rot')->find_many();
    // $x = $dotx -> as_array();
    $response = array();
    foreach ($dotx as $value){
        array_push($response, $value->as_array());
    }
    echo json_encode($response);
});

$app->get('/ljp4', function() use ($app){

    $dotx = Model::factory('ljp4')->find_many();
    // $x = $dotx -> as_array();
    $response = array();
    foreach ($dotx as $value){
        array_push($response, $value->as_array());
    }
    echo json_encode($response);
});


$app->get('/dot/:id', function($id) use ($app){

    $dotx = Model::factory('dot')->find_one($id);
    echo json_encode($dotx -> as_array());
});


$app->post(
    '/dot',
    function () use ($app){
        $dot = Model::factory('dot')->create();
        $requestBody = $app->request()->getBody();  
        $json_a = json_decode($requestBody, true);
        $dot->x = $json_a['x'];
        $dot->y = $json_a['y'];
        $dot->size = $json_a['size'];
        $dot->color = $json_a['color'];

        $dot->save();

    }
);

$app->run();
?>