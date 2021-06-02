<?php

class Database {
    private $server = 'localhost';
    private $user = 'db_user';
    private $password = '12345';
    private $database = 'movies';
    private $connection = false;

    function __construct() {
        $this->connection = new mysqli($this->server, $this->user, $this->password, $this->database) 
        or  die('Could not connect to server. Connection failed:'. $this->connection->error);
    
    }

    function get_connection() {
        return $this->connection;
    }
    
    function close_connection(){
        if($this->connection != false){
           $this->connection->close();
        }
    
        $this->connection = false;
    }

    function get_data($query){
        $results = $this->connection->query($query);
        $formatted_results = [];

        foreach($results as $result){
            $formatted_results[] = $result;
        }

        return $formatted_results;
    }

    function insert_data($query){
        $results = $this->connection->query($query);
        $rows = $this->connection->affected_rows;

        if($rows == 0){
            return 0;
        }
        return $this->connection->insert_id;
    }
}

?>