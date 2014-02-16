<?php

/*
 * Simple script to automate classes loading
 * Ideal sandbox for basic tests
 *
 * Created by egel 2011 - Maciej Sypień
 */

/*
 * Simple function to autoload classes
 */
function __autoload_my_classes($className)
{
	require_once 'classes/'.$className.'.class.php';
}
spl_autoload_register('__autoload_my_classes');

$zoo = new Zoo();
$zoo->startTour();
?>
