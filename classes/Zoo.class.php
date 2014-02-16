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
    //echo '<p>----------------------------------------------------</p>';
  }

  function startTour()
  {
    $this->welcome();

    echo '<h2>Let\'s begin our tour</h2>';

    $croco = new Croco();
    $croco->sayHi();

    $giraffe = new Giraffe();
    $giraffe->sayHi();

    $elephant = new Elephant();
    $elephant->sayHi();

    $lion = new Lion();
    $lion->sayHi();

    $zebra = new Zebra();
    $zebra->sayHi();

    $monkey = new Monkey();
    $monkey->sayHi();

    $hippo = new Hippo();
    $hippo->sayHi();
  }
}

?>
