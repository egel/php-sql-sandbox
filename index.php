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
  /*
   *  Test MySQL connection or show error
   */
  $lacz = connect_db();

  // Start the project
  $zoo = new Zoo();
  $zoo -> startTour();
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
