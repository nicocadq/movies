<?php

require_once './Database.php';

class MovieModel extends Database {

  function create($name, $description) {
    $sql_query = 'INSERT INTO movies (name, description) VALUES(?,?)';
    $statement = parent::get_connection()->prepare($sql_query);
    $statement->bind_param('ss', $name, $description);
    $statement->execute();
    $statement->close();
    return true; 
  }

  function get_all(){
    $sql_query = 'SELECT * FROM movies';
    $data = parent::get_data($sql_query);
    return $data; 
  }

}

?>