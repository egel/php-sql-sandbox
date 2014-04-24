<?php

/**
*   Main Zoo class
*/
class Zoo
{

  private $welcome = 'Welcome to our happy Zoo!';
  private $welcome_2 = 'You\'re allways welcome here :)';

  public function get_welcome()
  {
    return '
    <h1>'.$this->welcome.'</h1>
    <h3>'.$this->welcome_2.'</h3>
    <img src="images/zoo-welcome.jpg" title="'.$this->welcome.'" />';
  }

  public function get_startTour()
  {
    return $this->get_welcome().
    '<h2>Let\'s begin our tour</h2>'.
    $this->get_all_animals();
  }

  public function fetch_all_animals()
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

  public function get_all_animals()
  {
    $result = $this->fetch_all_animals();

    $all_animals = ""; // pusta zmienna do zbierania wszystkich wyników z bazy danych

    for($i=1; $i<=$result->num_rows; $i++)
    {
      $row = $result->fetch_object(); // zwraca wartość zapytania jako obiekty
      $animal_type = ucwords($row->type); // set the type of animal with first uppercase letter
      $animal = new $animal_type($row); // create animal object by calling auto-class loader
      $all_animals .= $animal->get_sayHi();
    }

    return $all_animals;
  }
}

?>
