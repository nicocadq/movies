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
        http_response_code(405);
        echo json_encode(['error' => 'Unavailable method.'], JSON_PRETTY_PRINT);
        break;
}

function get() {
  $movie_model = new MovieModel();

  $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

  if($id){
    http_response_code(200);
    echo json_encode($movie_model->get_by_id($id), JSON_PRETTY_PRINT);
  }else{
    http_response_code(200);
    echo json_encode($movie_model->get_all(), JSON_PRETTY_PRINT);
  }
}

function post() {
  $movie_model = new MovieModel();

  $body_data = json_decode(file_get_contents('php://input'));

  if($body_data->name && $body_data->image) {
    $is_created = $movie_model->create($body_data->name, $body_data->image);

    if($is_created) {
      $mailer = new Mailer($body_data->name, $body_data->image);
      $mailer->send();

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
