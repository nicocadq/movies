<?php

require 'vendor/autoload.php';

require_once './MovieModel.php';

$movie_model = new MovieModel();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movies</title>
  </head>
  <body>
    <section>
      <h2>Movies</h2>
      <ul>
        <?php

        foreach($movie_model->get_all() as $movie){ 
          echo '<li>'.$movie['name'].'</li>'; 
        } 

        ?>
      </ul>
    </section>

    <section>
      <h2>Add new movie</h2>
      <form action="#" method="POST">
        <label for="name">
          Name:
          <input id="name" name="name" placeholder="Name"/>
        </label>
        <label for="description">
          Description:
          <input id="image" name="image" placeholder="Image URL"/>
        </label>
        <input type="submit"/>
      </form>
      <?php 

      $name = isset($_POST['name']) ? $_POST['name'] : null;
      $image = isset($_POST['image']) ? $_POST['image'] : null;

      if($name && $description) {
        $movie_model->create($name, $image);
      }
      
      ?>
    </section>

  </body>
</html>
