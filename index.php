<?php

require 'vendor/autoload.php';

require_once './MovieModel.php';


header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET': 
        get();
        break;
    case 'POST': 
        post();
        break;
    default:
        http_response_code(404);
        echo json_encode(['error' => 'Unavailable method.'], JSON_PRETTY_PRINT);
        break;
}

function get() {
  $movie_model = new MovieModel();

  http_response_code(200);
  echo json_encode($movie_model->get_all(), JSON_PRETTY_PRINT);
}

function post() {
  $movie_model = new MovieModel();

  $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
  $image = isset($_REQUEST['image']) ? $_REQUEST['image'] : null;

  if($name && $image) {
    $is_created = $movie_model->create($name, $image);

    if($is_created) {
      sendMovieEmail($name, $image);

      http_response_code(201);
      echo json_encode('Successfully created', JSON_PRETTY_PRINT);
    } else {
      http_response_code(400);
      echo json_encode('Something went wrong', JSON_PRETTY_PRINT);
    }
  } else {
    http_response_code(400);
    echo json_encode('Missing params', JSON_PRETTY_PRINT);
  }
}


?>
