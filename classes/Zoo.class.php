<?php

/**
*   Main Zoo class
*/
class Zoo
{

  private $welcome = 'Welcome to our happy Zoo!';
  private $welcome_2 = 'You\'re allways welcome here :)';

  function welcome()
  {
    echo '<h1>'.$this->welcome.'</h1>';
    echo '<h3>'.$this->welcome_2.'</h3>';
    echo '<img src="images/zoo-welcome.jpg" title="'.$this->welcome.'" />';
  }

  function startTour()
  {
    $this->welcome();
    echo '<h2>Let\'s begin our tour</h2>';
    $this->render_all_animals();
  }

  function fetch_all_animals()
  {
    $connection = connect_db();
    $sql = 'SELECT animals.type,
                    animals.name AS animal_name,
                    continents.name AS continent_name,
                    animals.age,
                    animals.like_todo,
                    animals.image_name
            FROM animals, continents
            WHERE animals.continent_id = continents.id';
    $result = $connection->query($sql);
    return $result;
  }

  function render_all_animals()
  {
    $result = $this->fetch_all_animals();

    for($i=1; $i<=$result->num_rows; $i++)
    {
      $row = $result->fetch_object(); // zwraca wartość zapytania jako obiekty
      $animal_type = ucwords($row->type); // set the type of animal with first uppercase letter
      $animal = new $animal_type($row); // create animal object by calling auto-class loader
      $animal->sayHi();
    }
  }
}

?>
