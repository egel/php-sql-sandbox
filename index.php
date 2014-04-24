<?php

/*
 * Simple script to automate classes loading
 * Ideal sandbox for basic tests
 *
 * Created by egel 2011 - Maciej Sypień
 */

// Order of loading files is important!
include_once 'config.php'; // Load simple local config
include_once 'methods.php'; // Load simple local methods

try
{
  // Test MySQL connection or show error
  $lacz = connect_db();

  // Sprawdzenie czy jest przekazana strona
  if(isset($_GET['page']))
  {
    $strona = $_GET['page'];
  }
  else
  {
    $strona = 'glowna';
  }


  // prosta zmieniarka dla stron ( tak prosta że, aż boli ta prostota :P )
  switch ($strona)
  {
    case 'zoo':
      // Strona poświęcona zoo
      $zoo = new Zoo();
      $page_zoo = new Page("Strona o przyjaznym Zoo", $zoo->get_startTour(), TRUE);
      break;

    default:
    case 'glowna':
    // Strona główna, dodatkowo jest stroną domyślną
      $page_main = new Page("Strona Główna", "To jest super krótki wstęp na stronę główną");
      $page_main->render_page();
      break;
  }
}
catch(Exception $e)
{
  echo "<p>";
  echo "Exception occured in " . $e->getFile() . " on line " . $e->getLine() . "<br/>";
  echo "Message: " . $e->getMessage() . "</br>";
  echo "Code of error: " . $e->getCode();
  echo "</p>";
}
?>
