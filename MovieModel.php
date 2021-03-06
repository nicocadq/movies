<?php

require_once './Database.php';
require_once './Mailer.php';

class MovieModel extends Database {

  function create($name, $image) {
    $sql_query = 'INSERT INTO movies (name, image) VALUES(?,?)';
    $statement = parent::get_connection()->prepare($sql_query);
    $statement->bind_param('ss', $name, $image);
    $statement->execute();
    $statement->close();
    return true; 
  }

  function get_all(){
    $sql_query = 'SELECT * FROM movies';
    $data = parent::get_data($sql_query);
    return $data; 
  }

  
  function get_by_id($id){
   $sql_query = 'SELECT * FROM movies WHERE id='. $id;
   $data = parent::get_data($sql_query);
   return $data;
  }

}

?>